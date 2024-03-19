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
            'phone' => '09379608155',
            'email' => 'moeensedaghaty86@gmail.com',
            'email_confirmation' => 'moeensedaghaty86@gmail.com',
            'password' => bcrypt('Moeen576786'),
        ]);

        $admin->assignRole('Admin');
    }
}
