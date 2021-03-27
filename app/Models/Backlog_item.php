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

}

