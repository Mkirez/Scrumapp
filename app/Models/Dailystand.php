<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailystand extends Model
{
    use HasFactory;
    protected $table = 'dailystands';

    protected $guarded = [];
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function dailystand_items()
    {
        return $this->hasMany('App\Models\Dailystand_item');
    }
}
