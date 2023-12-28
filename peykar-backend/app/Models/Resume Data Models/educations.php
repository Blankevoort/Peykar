<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class educations extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "grade",
        "fieldofStudy",
        "university",
        "university",
        "GPA",
        "start",
        "end",
        "stillStuding",
        "underDiploma",
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
