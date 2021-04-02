<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $group =\App\Models\Group::factory()->create();
        //\App\Models\Contact::factory(5)->create();
        $contacts = \App\Models\Contact::factory()
                    ->count(3)
                    ->for($group)
                    ->create();
    }
}
