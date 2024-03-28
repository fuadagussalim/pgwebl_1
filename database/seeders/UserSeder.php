<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create a New User
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->phone = '081234567890';
        $user->email = 'admin@contoh.com';
        $user->password = bcrypt('password');
        $user->is_admin = true;
        $user->save();

        //Create User Array
        $users = [
            [
                'name' => 'User',
                'phone' => '081234567891',
                'email' => 'user@contoh.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'User2',
                'phone' => '081234567892',
                'email' => 'user2@contoh.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
        ];

        //Insert User
        DB::table('users')->insert($users);

    }
}
