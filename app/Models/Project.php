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
    	return $this->belongsToMany(User::class , 'project_user','project_id', 'user_id' );
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

    public function not_in_project(Project $project)
    {
        return $this->belongsToMany(User::class, 'project_user','project_id', 'user_id' )->withPivot('project_id', '!=' , $project->id);
    }

    
}

