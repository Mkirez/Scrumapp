<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retrospective_item extends Model
{
    //use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}
