<?php

namespace App\Models;

use App\Models\User;
use App\Models\Profile\books;
use App\Models\Profile\langs;
use App\Models\Profile\awards;
use App\Models\Profile\skills;
use App\Models\Profile\courses;
use App\Models\Profile\Socials;
use App\Models\Profile\portfolio;
use App\Models\Profile\activities;
use App\Models\Profile\colleagues;
use App\Models\Profile\educations;
use App\Models\Profile\softwareSkills;
use App\Models\Profile\workExperience;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\AcademicExperience;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "birth",
        "resume",
        "description",
        "gender",
        "maritalStatus",
        "militaryServiceStatus",
        "city",
        "region",
        "expectedSalary",
        "preferredJob",
        "foreigners",
        "disability",
        "nationality",
        "disabilityType",
        "user_id",
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function socials() {
        return $this->hasMany(Socials::class);
    }

    public function activities()
    {
        return $this->hasMany(activities::class);
    }

    public function softwareskills()
    {
        return $this->hasMany(softwareSkills::class);
    }

    public function academicexps()
    {
        return $this->hasMany(AcademicExperience::class);
    }

    public function awards()
    {
        return $this->hasMany(awards::class);
    }

    public function books()
    {
        return $this->hasMany(books::class);
    }

    public function courses()
    {
        return $this->hasMany(courses::class);
    }

    public function langs()
    {
        return $this->hasMany(langs::class);
    }

    public function skills()
    {
        return $this->hasMany(skills::class);
    }

    public function colleagues()
    {
        return $this->hasMany(colleagues::class);
    }

    public function educations()
    {
        return $this->hasMany(educations::class);
    }

    public function workExperience()
    {
        return $this->hasMany(workExperience::class);
    }

    public function portfolio()
    {
        return $this->hasMany(portfolio::class);
    }
}
