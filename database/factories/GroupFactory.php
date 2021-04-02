<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'group_name'=>$this->faker->unique()->sentence($nbWords = 3, $variableNbWords = true) ,
           'group_code'=>$this->faker->unique()->numerify('GROUP-###'),
            'group_description'=> $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'created_by'=> $this->faker->name,
            'updated_by'=>$this->faker->name
        ];
    }
}
