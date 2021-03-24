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

        public function project()
        {
            return $this->belongsTo(Project::class);
        }
}
