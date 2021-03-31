<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backlog_item extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    
    // protected $fillable = [];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    // Sprint backlog functions

    public function add_to_sprint($sprint)
    {
        $this->added_to_sprint = 1;
        $this->sprint_id = $sprint->id;
        $this->save();
    }

    public function remove_from_sprint()
    {
        $this->added_to_sprint = 0;
        $this->sprint_id = null;
        $this->save();
    }

}

