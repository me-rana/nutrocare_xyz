<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(DB::table('statuses')->count() == 0){
            DB::table('statuses')->insert([
                [
                    'name' => 'Off',
                    'status' => '0'
                ],
                [
                    'name' => 'On',
                    'status' => '1'
                ]

            ]);
        }
    }
}
