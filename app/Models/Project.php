<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function backlog_items()
    {
        return $this->hasMany('App\Models\Backlog_item');
    }

    public function users()
    {
        // laravel gaat rare colummen verzinnen in die pivot, vandaar dat je de naam moet noemen van de pivot en de twee id's.
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }

    public function sprints()
    {
        return $this->hasMany(Sprint::class);
    }

    public function retrospectives()
    {
        return $this->hasMany(Retrospective::class);
    }

    public function user_to_project(User $user)
    {
        return $this->users()->save($user);
    }

    public function users_in_project()
    {
        // search all users in current project on pivot table.
        $that = $this;
        return User::whereHas('projects', function ($query) use ($that) {
            return $query->where('project_id', '=', $that->id);
        })->get();
    }

    // public function not_in_project(Project $project)
    // {
    //     return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    // }
}
