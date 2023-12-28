<?php

namespace App\Models;

use App\Models\Socials;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "birth",
        "resume",
        "description",
        "phone",
        "gender",
        "maritalStatus",
        "militaryServiceStatus",
        "city",
        "region",
        "expectedSalary",
        "preferredJob",
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

    public function socials() {
        $this->belongsTo(Socials::class);
    }
}
