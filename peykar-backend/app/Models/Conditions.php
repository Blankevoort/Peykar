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
        "job_id",
    ];

    public $timestamps = false;

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function degree()
    {
        return $this->hasOne(Degree::class, 'condition_id');
    }

    public function softwares()
    {
        return $this->hasMany(Software::class, 'condition_id');
    }
}
