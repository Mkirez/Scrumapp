<?php

namespace App\Http\Controllers\PersonalProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mysql_xdevapi\Table;
use mysql_xdevapi\TableSelect;

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
    public function boot()
    {
        return view('PersonalProfile.profile');
    }
}
