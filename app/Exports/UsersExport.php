<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return DB::table('users')
        ->join('reviews','reviews.user_id','=','users.id')
        ->join('products','reviews.product_id','=','products.id')
        ->where('price','>',3000)
        ->whereRaw('4 < (select sum(rating)/count(rating) from ratings where ratings.user_id=users.id)')
        ->whereRaw('10 < (select count(rating) from ratings where ratings.user_id=users.id)')
        ->get();
    }
}
