<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ReviewSeeder extends Seeder
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
            DB::table('reviews')
                ->insert([
                    'review' => $faker->realText(350),
                    'usefulness_count' => $faker->numberBetween(0, 400),
                    'user_id' => $faker->numberBetween(1, 70),
                    'product_id' => $faker->numberBetween(1, 500),
                ]);
        }
    }
}
