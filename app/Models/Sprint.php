<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    
    public function retrospective_items()
        {
            return $this->hasMany(Retrospective_item::class);
        }
}
