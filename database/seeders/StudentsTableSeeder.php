<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
              
        for ($i=0; $i < 10; $i++) { 
            Student::create([
                 'name' => $faker->name(), 
                 'email' => $faker->safeEmail,
                 'sex' => $faker->randomElement(["male", "female"]),
                 'place_of_birth' => 'Budapest',
                 'date_of_birth' => '2000-01-01'
            ]);
        }
    }
}
