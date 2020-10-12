<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReviewsExport implements FromCollection
{
    public function collection()
    {
        return DB::table('reviews')
        ->join('users','reviews.user_id','=','users.id')
        ->join('products','reviews.product_id','=','products.id')
        ->whereIn('city',['Samara','Volgograd'])
        ->orWhere('usefulness_count','>',10)
        ->get();
    }
}
