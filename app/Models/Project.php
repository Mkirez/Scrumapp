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
    	return $this->belongsToMany(User::class);
    }
}

