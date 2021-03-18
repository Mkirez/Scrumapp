<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\User;
use App\Models\Teamusers;

class teamUserController extends Controller
{
    public function index(Project $project)
    {
         


        $allUsers = User::all();
        // $allUsers = $project->users;
        return view('projects.teamember', compact('allUsers', 'project'));
    }

    public function create(Project $project, Request $request)
    {
        
        $project->user_to_project(User::find($request->user_id));
        return back();
    }

    public function store(Request $request)
    {
        // if ($request->user_id == 0) {
        //     echo "User komt al voor";
        //     exit;
        // }

        // $teamuser = new Teamusers();

        // $teamuser->team_id = $request->team_id;
        // $teamuser->user_id = $request->user_id;

        // $teamuser->save();
        // return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
