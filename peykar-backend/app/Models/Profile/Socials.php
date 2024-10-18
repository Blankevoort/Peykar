<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Socials extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address'
    ];

    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'socials_profile');
    }
}
