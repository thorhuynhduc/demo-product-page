<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('password'),
        ]);
    }
}