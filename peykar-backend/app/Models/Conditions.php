<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Degree;
use App\Models\Software;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conditions extends Model
{
    use HasFactory;

    protected $fillable = [
        "age",
        "gender",
        "militaryService",
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function degree()
    {
        return $this->hasOne(Degree::class);
    }

    public function softwares()
    {
        return $this->hasMany(Software::class);
    }
}
