<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(DB::table('companies')->count() == 0){
            DB::table('companies')->insert([
                'name' => 'RanaSVC',
                'address' => 'Mirpur,Dhaka-1216',
                'email' => 'contact@ranasvc.com',
                'phone' => '+8801521380065',
                'support' => '+8801521380065',
                'description' =>  'Ecommerce Website develop from RanaSVC.com for better quality and cheap price',
                'copyright' => 'RanaSVC'

            ]);
        }
    }
}
