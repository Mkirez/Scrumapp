<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rights',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function stakeholder()
    {
        return $this->rights == 0;
    }

    public function team_member()
    {
        return $this->rights == 1;
    }

    public function product_owner()
    {
        return $this->rights == 2;
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
