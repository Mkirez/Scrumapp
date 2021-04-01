<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retrospective extends Model
{
  //  use HasFactory;
    protected $table = 'retrospectives';

        protected $guarded = [];
        public $timestamps = false;

        public function sprint()
        {
            return $this->belongsTo(Sprint::class);
        }

        public function retrospective_items()
    {
        return $this->hasMany(Retrospective_item::class);
    }
}
