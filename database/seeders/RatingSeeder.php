<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($it = 0;  $it < 10**3; ++$it){
            DB::table('ratings')
                ->insert([
                    'rating' => $faker->numberBetween(1, 100),
                    'user_id' => $faker->numberBetween(1, 70),
                    'product_id' => $faker->numberBetween(1, 500),
                ]);
        }
    }
}
