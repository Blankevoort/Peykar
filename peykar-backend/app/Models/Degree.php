<?php

namespace App\Models;

use App\Models\Conditions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Degree extends Model
{
    use HasFactory;

    protected $fillable = [
        "field",
        "proficiency",
        'condition_id'
    ];

    public function condition()
    {
        return $this->belongsTo(Conditions::class);
    }
}
