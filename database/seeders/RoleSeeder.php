<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(DB::table('roles')->count() == 0){
            DB::table('roles')->insert([
                [
                    'name' => 'User',
                ],
                [
                    'name' => 'Admin' 
                ]
            ]);
        }
    }
}
