<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use HasFactory, Notifiable;

    protected $profiles = [
        /**
         * The model's default values for attributes.
         *
         * @var array
         */

        'about_me',
        'team',
        'team_role',
        'projects',
        'delayed' => false

    ];
    /**
     * Get the user record associated with the profile.
     */
    public function user()
    {
        return $this->hasOne('app\Models\Users', 'profiles_user_id_foreign');
    }
    protected $users = [
    /**
     * The foreign table's values for attributes
     *
     * @var array
     */

        'name',
        'email'
    ];
}
