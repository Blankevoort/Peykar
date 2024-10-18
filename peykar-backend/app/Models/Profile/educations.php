<?php

namespace App\Models\Profile;

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
        "GPA",
        "start",
        "end",
        "stillStuding",
        "underDiploma",
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
