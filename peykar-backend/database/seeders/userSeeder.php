<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class userSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Moeen',
            'email' => 'moeensedaghaty86@gmail.com',
            'password' => bcrypt('Moeen576786'),
        ]);

        $admin->assignRole('Admin');

        User::create([
            'name' => 'Moeen Sedaqati',
            'email' => 'moeensedaghaty71@gmail.com',
            'password' => bcrypt('Moeen576786'),
        ]);
    }
}
