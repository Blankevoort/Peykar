<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'profile_id',
    ];

    public $timestamps = false;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
