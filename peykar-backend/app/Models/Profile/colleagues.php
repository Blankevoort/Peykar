<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class colleagues extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'organizationName',
        'jobTitle',
        'organizationalRelationship',
        'contactNumber',
        'startYear',
        'endYear',
        'weStillWorkTogether',
        'profile_id',
    ];

    public $timestamps = false;

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
