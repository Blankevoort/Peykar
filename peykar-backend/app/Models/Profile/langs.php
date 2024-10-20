<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class langs extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang',
        'level'
    ];

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
