<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'additionalSkills'
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'skills_profile');
    }
}
