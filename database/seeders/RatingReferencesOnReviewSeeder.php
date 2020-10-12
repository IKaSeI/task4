<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class RatingReferencesOnReviewSeeder extends Seeder
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

            $rating = DB::table('ratings')->find($it+1);
            if(!$rating) continue;

            $reviews = DB::table('reviews')->where([
                ['user_id','=', $rating->user_id],
                ['product_id','=', $rating->product_id]
            ])
            ->get();
            if(!$reviews->count()) continue;
            $review = $reviews->get($faker->numberBetween(0,$reviews->count()-1));

            $rating->review_id = $review->id;

            DB::table('ratings')
                ->where('id', $it+1)
                ->update(get_object_vars($rating));
        }
    }
}
