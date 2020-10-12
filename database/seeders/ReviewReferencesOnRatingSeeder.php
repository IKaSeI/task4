<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ReviewReferencesOnRatingSeeder extends Seeder
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

            $review = DB::table('reviews')->find($it+1);
            if(!$review) continue;

            $ratings = DB::table('ratings')->where([
                ['user_id','=', $review->user_id],
                ['product_id','=', $review->product_id]
            ])
            ->get();
            if(!$ratings->count()) continue;
            $rating = $ratings->get($faker->numberBetween(0,$ratings->count()-1));

            $review->rating_id = $rating->id;

            DB::table('reviews')
                ->where('id', $it+1)
                ->update(get_object_vars($review));
        }
    }
}
