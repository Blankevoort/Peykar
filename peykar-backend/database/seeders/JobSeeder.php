<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'title' => 'Testing Job',
            'workDate' => 'شنبه - چهارشنبه',
            'workHours' => '10 - 18',
            'description' => 'this job is made just for testing purpose',
            'province' => 'Tehran',
            'street' => 'Mirdamad',
            'rights_min' => '20',
            'rights_max' => '35',
            'user_id' => '1',
        ]);
    }
}
