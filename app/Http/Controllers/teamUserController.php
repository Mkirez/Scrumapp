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
        // search all users in current project on pivot table.
        $users_in_project = User::whereHas('projects', function ($query) use ($project){
            return $query->where('project_id', '=', $project->id);
        })->get();

        // excluding current project users with from all users.
        $not_in_project_users = User::all()->diff($users_in_project);

        return view('projects.teamember', compact('not_in_project_users', 'project','users_in_project'));
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
