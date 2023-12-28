<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class awards extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year'
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
