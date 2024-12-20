<?php

namespace Database\Seeders;

use Carbon\Carbon;
use \App\Models\User;
use App\Models\Profile;
use App\Models\Profile\books;
use App\Models\Profile\langs;
use App\Models\Profile\awards;
use App\Models\Profile\skills;
use App\Models\Profile\courses;
use App\Models\Profile\Socials;
use Illuminate\Database\Seeder;
use App\Models\Profile\partners;
use App\Models\Profile\activities;
use App\Models\Profile\colleagues;
use App\Models\Profile\educations;
use App\Models\Profile\softwareSkills;
use App\Models\Profile\workExperience;
use App\Models\Profile\academicExperience;
use App\Models\Profile\portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    public function run()
    {
        $currentDate = "2024";

        $admin = User::firstOrCreate(
            ['email' => 'moeensedaghaty86@gmail.com'],
            [
                'name' => 'Moeen',
                'phone' => '09379608155',
                'jobTitle' => 'برنامه نویس',
                'email_confirmation' => 'moeensedaghaty86@gmail.com',
                'password' => bcrypt('Moeen576786'),
            ]
        );

        $admin->assignRole('Admin');

        $profile = Profile::firstOrCreate(
            ['user_id' => $admin->id],
            [
                "birth" => "2000-01-01",
                "resume" => "Sample Resume.pdf",
                "description" => "This is a sample description.",
                "gender" => "Male",
                "maritalStatus" => "Single",
                "militaryServiceStatus" => "Completed",
                "city" => "Tehran",
                "region" => "District 1",
                "expectedSalary" => 5000,
                "preferredJob" => json_encode(["توسعه‌دهنده وب"]),
                "foreigners" => false,
                "disability" => false,
                "nationality" => "Iranian",
                "disabilityType" => null,
            ]
        );

        academicExperience::firstOrCreate([
            'name' => 'Bachelor of Computer Science',
            'year' => $currentDate,
            'profile_id' => $profile->id,
        ]);

        activities::firstOrCreate([
            'name' => 'Coding Bootcamp Participation',
            'year' => $currentDate,
            'profile_id' => $profile->id,
        ]);

        awards::firstOrCreate([
            'name' => 'Best Developer Award',
            'year' => $currentDate,
            'profile_id' => $profile->id,
        ]);

        books::firstOrCreate([
            'name' => 'Mastering Laravel',
            'publisher' => 'TechBooks',
            'year' => $currentDate,
            'profile_id' => $profile->id,
        ]);

        courses::firstOrCreate([
            'name' => 'Advanced PHP Course',
            'organizer' => 'Tech Institute',
            'length' => '3 months',
            'country' => 'Iran',
            'certified' => true,
            'year' => $currentDate,
            'profile_id' => $profile->id,
        ]);

        softwareSkills::firstOrCreate([
            'name' => 'Figma',
            'level' => 'Fluent',
            'profile_id' => $profile->id,
        ]);

        langs::firstOrCreate([
            'lang' => 'English',
            'level' => 'Fluent',
            'profile_id' => $profile->id,
        ]);

        skills::firstOrCreate([
            'name' => 'Laravel',
            'level' => 'Expert',
            'additionalSkills' => 'PHP, Vue.js',
            'profile_id' => $profile->id,
        ]);

        Socials::firstOrCreate([
            'name' => 'LinkedIn',
            'address' => 'https://www.linkedin.com/in/moeensedaghaty',
            'profile_id' => $profile->id,
        ]);

        educations::firstOrCreate([
            "degree" => "Diploma",
            "field" => "Science",
            "university" => "Tehran High School",
            "gpa" => "3.8",
            "start" => $currentDate,
            "end" => $currentDate,
            "stillStuding" => false,
            "underDiploma" => false,
            'profile_id' => $profile->id,
        ]);

        colleagues::firstOrCreate([
            'fullName' => 'Jane Smith',
            'organizationName' => 'InnovateX',
            'jobTitle' => 'Software Engineer',
            'organizationalRelationship' => 'Team Member',
            'contactNumber' => '987654321',
            'startYear' => $currentDate,
            'endYear' => $currentDate,
            'weStillWorkTogether' => false,
            'profile_id' => $profile->id,
        ]);

        workExperience::firstOrCreate([
            'jobTitle' => 'Backend Developer',
            'field' => 'Web Development',
            'organizationalLevel' => 'Junior',
            'companyName' => 'Web Innovators',
            'companyField' => 'Digital Solutions',
            'country' => 'Iran',
            'city' => 'Isfahan',
            'startMonth' => 'February',
            'startYear' => $currentDate,
            'endMonth' => 'Ongoing',
            'endYear' => $currentDate,
            'currentlyWorking' => true,
            'achievements' => 'Built APIs for major clients.',
            'profile_id' => $profile->id,
        ]);

        portfolio::firstOrCreate([
            'url' => 'https://moeensedaqati.ir/',
            'profile_id' => $profile->id,
        ]);
    }
}
