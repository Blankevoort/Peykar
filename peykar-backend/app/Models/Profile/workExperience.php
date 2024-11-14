<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class workExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobTitle',
        'field',
        'organizationalLevel',
        'companyName',
        'companyField',
        'country',
        'city',
        'startMonth',
        'startYear',
        'endMonth',
        'endYear',
        'currentlyWorking',
        'achievements',
        'profile_id',
    ];

    public $timestamps = false;

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
