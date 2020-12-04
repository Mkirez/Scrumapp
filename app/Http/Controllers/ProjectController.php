<?php

namespace App\Http\Controllers; 


use App\Models\Project;
use App\Models\Teamusers;
use App\Models\Sprint;
use App\Models\Backlog;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {


        $project = Project::all();

        return view('/projects')->with('projects', $project);
    }

    public function show(Project $project)
    {
        //echo "show projects";
        //echo $project;
        $id=$project->id;
        $backlogs=Backlog::all()->where('project_id', $id);
        $sprints=Sprint::all()->where('project_id', $id);
        //$teamusers=Teamusers::all();



        $sql = "SELECT users.name as userName, projects.name  as  projectName
FROM users,projects,team_users
where team_users.team_id=projects.team_id and team_users.user_id=users.id
 AND projects.id = '$id'";
    //echo $sql;
    //exit;

        $teamusers = DB::select($sql);

        //return $teamusers;
        //exit();

        return view('projects.backlog', ['project' => $project,
            'backlogs'=>$backlogs, 'sprints'=>$sprints, 'teamusers'=>$teamusers] );


    }

    public function create()
    {
        echo "sasa";
       
    }

    public function store(Request $request)
    {
        // Project::create($this->validateProject());
        
        // return redirect('/projects');
        // $input = $request->all();


        $backlog = new Backlog();
        $backlog->moscow = $request->moscow;
        $backlog->description = $request->description;
        $backlog->backlog_item = $request->backlog_item;
        $backlog->deadline = $request->deadline;
        $backlog->project_id = $request->project_id;
        $backlog->save();


        return redirect('/projects/');


        // return $input;


    }

    public function edit()
    {
        //
        echo "edit";
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
