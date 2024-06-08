<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannercatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(DB::table('bannercategories')->count() == 0){
            DB::table('bannercategories')->insert([
                'name' => 'Banner',
                'slug' => 'banner-1',
                'status' => '1',
            ]);
        }
    }
}
