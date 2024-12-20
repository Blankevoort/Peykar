<?php

namespace App\Models\Profile;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'publisher',
        'year',
        'profile_id',
    ];

    public $timestamps = false;

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
