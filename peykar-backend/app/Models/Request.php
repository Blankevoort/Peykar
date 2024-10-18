<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;

    protected $fillabel = [
        "state",
        'job_id',
        'user_id',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
