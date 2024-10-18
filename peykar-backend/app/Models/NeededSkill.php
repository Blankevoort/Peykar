<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NeededSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "level",
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
