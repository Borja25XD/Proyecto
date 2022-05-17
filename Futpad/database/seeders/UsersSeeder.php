<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
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
                'name' => 'admin',
                'type' => 'admin',
                'phone' => '628874867',
                'email' => 'admin@futpad.com',
                'password' => Hash::make('secret123'),
            ],
            [
                'name' => 'Borja',
                'type' => 'customer',
                'phone' => '628874868',
                'email' => 'borjasantos7@gmail.com',
                'password' => Hash::make('secret123'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
