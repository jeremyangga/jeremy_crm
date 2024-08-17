<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
            [
                'name' => 'John Doe',
                'isManager' => true,
                'username' => 'johndoe',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Smith',
                'isManager' => false,
                'username' => 'janesmith',
                'password' => Hash::make('password456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Robert Brown',
                'isManager' => false,
                'username' => 'robertbrown',
                'password' => Hash::make('password789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
