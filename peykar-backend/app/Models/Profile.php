<?php

namespace App\Models;

use App\Models\Socials;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "birth",
        "resume",
        "description",
        "phone",
        "gender",
        "maritalStatus",
        "militaryServiceStatus",
        "city",
        "region",
        "expectedSalary",
        "preferredJob",
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
        $this->belongsToMany(Socials::class);
    }

    public function activities()
    {
        return $this->belongsToMany(activities::class);
    }

    public function academicEXPS()
    {
        return $this->belongsToMany(AcademicExperience::class);
    }

    public function awards()
    {
        return $this->belongsToMany(awards::class);
    }

    public function books()
    {
        return $this->belongsToMany(books::class);
    }

    public function courses()
    {
        return $this->belongsToMany(courses::class);
    }

    public function langs()
    {
        return $this->belongsToMany(langs::class);
    }

    public function skills()
    {
        return $this->belongsToMany(skills::class);
    }
}
