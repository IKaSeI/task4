<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\ReviewsExport;

class load_csv_stat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load_csv_stat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create csv file with review statistic';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*$reviews = DB::table('reviews')
            ->join('users','reviews.user_id','=','users.id')
            ->join('products','reviews.product_id','=','products.id')
            ->whereIn('city',['Samara','Volgograd'])
            ->orWhere('usefulness_count','>',10)
            ->get();

        $users = DB::table('users')
            ->join('reviews','reviews.user_id','=','users.id')
            ->join('products','reviews.product_id','=','products.id')
            ->where('price','>',3000)
            ->whereRaw('4 < (select sum(rating)/count(rating) from ratings where ratings.user_id=users.id)')
            ->whereRaw('10 < (select count(rating) from ratings where ratings.user_id=users.id)')
            ->get();*/

        //convert to csv
        Excel::store(new UsersExport,storage_path('csv/users.csv'));
        Excel::store(new ReviewsExport,storage_path('csv/reviews.csv'));

        return 0;
    }
}
