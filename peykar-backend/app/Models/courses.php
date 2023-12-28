<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organizer',
        'length',
        'country',
        'certified',
        'year'
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
