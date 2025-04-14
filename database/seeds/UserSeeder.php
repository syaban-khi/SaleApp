<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role'=>'admin',
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
