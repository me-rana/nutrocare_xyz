<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(DB::table('users')->count() == 0){
            DB::table('users')->insert([
                'name' => 'Rana Bepari',
                'email' => 'dev@rana.my.id',
                'email_verified_at' => '2024-06-06 11:59:59',
                'role_id' => '2',
                'password' => Hash::make('me@1122')

            ]);
        }
    }
}
