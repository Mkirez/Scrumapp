<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'task';

    protected $fillable = ['remarks','status','sprint_id','team_user_id'];

    public $timestamps = false;
}
