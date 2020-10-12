<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($it = 0;  $it < 500; ++$it){
            DB::table('products')
                ->insert([
                    'name' => $faker->word(),
                    'price' => $faker->numberBetween(100, 10**5)
                ]);
        }
    }
}
