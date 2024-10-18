<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\History;
use App\Models\Profile;
use App\Models\Request;
use App\Models\Requests;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'jobTitle',
        'linkedIn',
        'password',
        'reminder_sent',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['profile', 'roles'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
