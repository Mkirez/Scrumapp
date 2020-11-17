<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use mysql_xdevapi\TableSelect;

class Profile extends Model
{
    use HasFactory, Notifiable;

    protected $profiles = [
        /**
         * The model's default values for attributes.
         *
         * @var array
         */

        'name',
        'email',
        'about_me',
        'team',
        'team_role',
        'projects',
        'delayed' => false
    ];
}
