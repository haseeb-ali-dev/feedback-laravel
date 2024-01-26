<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('Password@123'),
            ],
            [
                'name'     => 'User 1',
                'email'    => 'user1@gmail.com',
                'password' => Hash::make('Password@123'),
            ],
            [
                'name'     => 'User 2',
                'email'    => 'user2@gmail.com',
                'password' => Hash::make('Password@123'),
            ],
            [
                'name'     => 'User 3',
                'email'    => 'user3@gmail.com',
                'password' => Hash::make('Password@123'),
            ],
        ];

        User::insert($users);
    }
}
