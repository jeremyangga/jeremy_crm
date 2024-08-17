<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            [
                'name' => 'Alice Johnson',
                'isApproved' => true,
                'isSubscribed' => true,
                'idEmployee' => 1,
                'idProduct' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bob Smith',
                'isApproved' => false,
                'isSubscribed' => false,
                'idEmployee' => 2,
                'idProduct' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Charlie Brown',
                'isApproved' => false,
                'isSubscribed' => false,
                'idEmployee' => 3,
                'idProduct' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
