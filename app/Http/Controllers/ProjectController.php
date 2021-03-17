<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Teamusers;
use App\Models\Sprint;
use App\Models\Backlog;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;


use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Auth::User()->projects;

        return view('projects', compact('projects'));
    }

    public function show(Project $project, Request $request)
    {
        // $project = $request->route('id');
        // dd($project->id);
        $backlog_items = $project->backlog_items;
        $sprints = $project->sprints;
        $allUsers = $project->users;

        return view('projects.backlog', compact('project', 'backlog_items', 'sprints', 'allUsers'));
    }

    public function create()
    {
        // echo "hello";
        // dd(request());

        $id = Auth()->user();
        $project = Project::create($this->validateProject());
        $project->users()->attach($id);

        // $lastProjectId = DB::getPdo()->lastInsertId();
        // $projectName=request()->name;
        //echo $projectName;
        //exit;

        // return redirect('/projects');


        // $teamNieuw= new Team();
        // $teamNieuw->name = 'Team_'.$projectName;
        // $teamNieuw->description = '-';
        // $teamNieuw->save();
        // $lastTeamId = DB::getPdo()->lastInsertId();

        // $newUser= new Teamusers();
        // $newUser->team_id = $lastTeamId;
        // $newUser->user_id = '1';
        // $newUser->save();




        // $updateProject=Project::find($lastProjectId)->update(['team_id'=>$lastTeamId]);

        return back();

        // return $lastIdl;

    }

    public function store(Request $request)
    {



        // $input = $request->all();




        // $backlog = new Backlog();
        // $backlog->moscow = $request->moscow;
        // $backlog->description = $request->description;
        // $backlog->backlog_item = $request->backlog_item;
        // $backlog->deadline = $request->deadline;
        // $backlog->project_id = $request->project_id;
        // $backlog->save();


        // $project_id = $request->project_id;

        // return redirect('/projects/' . $project_id);
    }

    public function edit()
    {

        

        // $backlogs = Backlog::all()->where('project_id', $id);
    }

    public function update()
    {
        //
        echo "update";
    }

    protected function validateProject()
    {
        return request()->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
    }
}
