<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin1',
                'email'=>'Son@admin.com',
                'is_admin'=>'1',
                'status' => '1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User1',
                'email'=>'Son@user.com',
                'is_admin'=>'0',
                'status' => '0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Admin2',
                'email'=>'Gus@admin.com',
                'is_admin'=>'1',
                'status' => '1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User2',
                'email'=>'test@user.com',
                'is_admin'=>'0',
                'status' => '0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User3',
                'email'=>'cuba@user.com',
                'is_admin'=>'0',
                'status' => '0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User4',
                'email'=>'shuba@user.com',
                'is_admin'=>'0',
                'status' => '0',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
