<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UserSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($it = 0;  $it < 50; ++$it){
            DB::table('users')
                ->insert([
                    'name' => $faker->firstName,
                    'surename'=> $faker->lastName,
                    'city'=> $faker->city
            ]);
        }

        for($it = 0;  $it < 10; ++$it){
            DB::table('users')
                ->insert([
                    'name' => $faker->firstName,
                    'surename'=> $faker->lastName,
                    'city'=> 'Volgograd'
            ]);
            DB::table('users')
                ->insert([
                    'name' => $faker->firstName,
                    'surename'=> $faker->lastName,
                    'city'=> 'Samara'
            ]);
        }
    }
}
