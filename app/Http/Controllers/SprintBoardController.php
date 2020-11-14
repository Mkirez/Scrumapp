<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SprintBoardController extends Controller
{
    public function index(){
        return view('sprintBoard');
    }
}
