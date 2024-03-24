<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Request;
use App\Models\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "workDate",
        "workHours",
        "workSpace",
        "description",
        "province",
        "street",
        "rights_min",
        "rights_max",
        "user_id",
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
