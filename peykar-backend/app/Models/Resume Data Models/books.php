<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'publisher',
        'year'
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
