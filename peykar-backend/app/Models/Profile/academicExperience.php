<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academicExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year'
    ];

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
