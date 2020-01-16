<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$iSWWaHjpCxUM2U9TURX6rOYwVl4AkDD9E07Bi2Wyvq7UfpS2TmosG',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
