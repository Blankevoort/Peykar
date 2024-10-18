<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year'
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
