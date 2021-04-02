<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $group =\App\Models\Group::factory()->create();
        return [
                'contact_firstname'=>$this->faker->firstName($gender = null),
                'contact_lastname'=>$this->faker->lastName,
                'contact_phone1'=>$this->faker->unique()->regexify('^(2|6)[0-9]{8}$'),
                'contact_phone2'=>$this->faker->unique()->regexify('^(2|6)[0-9]{8}$'),
                'contact_email'=>$this->faker->unique()->safeEmail,
                'group_id'=>$group->id ,
                'created_by'=>$this->faker->name,
                'updated_by'=>$this->faker->name
         ];
    }
}
