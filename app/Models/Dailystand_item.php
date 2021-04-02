<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailystand_item extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    

    public function dailystand()
    {
        return $this->belongsTo('App\Models\Dailystand');
    }

    


}
