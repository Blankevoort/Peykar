<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Request;
use App\Models\NeededSkill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "backgroundImage",
        "image",
        "group",
        "workDate",
        "benefits",
        "description",
        "similarExperience",
        "workConditions",
        "location",
        "rightsMin",
        "rightsMax",
        "user_id",
        "expiresAt",
    ];

    protected $casts = [
        'benefits' => 'array',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function neededSkills()
    {
        return $this->belongsToMany(NeededSkill::class);
    }

    public function employmentCondition()
    {
        return $this->hasOne(Conditions::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
