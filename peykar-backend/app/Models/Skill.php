<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        "level",
        "proficiency",
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
