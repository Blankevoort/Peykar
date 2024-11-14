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
        "fieldOfStudy",
        "university",
        "GPA",
        "start",
        "end",
        "stillStuding",
        "underDiploma",
        'profile_id',
    ];

    public $timestamps = false;

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
