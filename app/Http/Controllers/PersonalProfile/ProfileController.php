<?php

namespace App\Http\Controllers\PersonalProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('PersonalProfile.profile',[
            //'emails' => $emails,
            'projects' => $projects = [1,2,3,4,5],
            'teams' => $teams = ['team1']
        ]);
    }
}
