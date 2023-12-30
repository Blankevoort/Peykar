<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->belongsTo(Job::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
