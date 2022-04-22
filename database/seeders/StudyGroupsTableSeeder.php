<?php

namespace Database\Seeders;

use App\Models\StudyGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $name = ['Typography', 'Biologist', 'Chemistry Capital', 
        'Web designer', 'Black magician', 'Lame gamer boys'];

        for ($i=0; $i < count($name) ; $i++) {             
            StudyGroup::create([
                'name' => $name[$i],
                'leader' => $faker->name,
                'subject' => $faker->text(20),
                'enrolled' => $faker->numberBetween(0, 1),
                'date_and_time' => '2000-01-01'
            ]);
        }
    }
}
