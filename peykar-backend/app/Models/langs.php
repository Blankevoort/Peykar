<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class langs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level'
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
