<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    // use HasFactory;

    protected $table = 'sprints';

    protected $fillable = ['project_id','created_at','updated_at','remarks'];

    public $timestamps = false;


    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    
}
