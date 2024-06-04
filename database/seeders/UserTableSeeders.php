<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'rizka',
            'nim' => '202269040057',
            'email' => 'email@gmail.com',
            'password' => Hash::make('123456'),
            'address' => 'pasuruan',
        ]);
    }
}
