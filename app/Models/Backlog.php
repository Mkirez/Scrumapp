<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
	protected $table = 'backlog_items';
    protected $fillable = ['description','backlog_item','moscow','deadline'];
}
