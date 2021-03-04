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


    

    // $id = Auth::user()->id;
    // $rights=Auth::user()->rights;
    

    if (Auth::user()->stakeholder() || Auth::user()->team_member() ) {
        
        $project = Project::where('number', 'FR 900')->first();
    }
    else{
        $project = Project::all();
    }

    // if ($rights == '0' OR $rights=='1'){
    //     $sql = "SELECT projects.id, projects.name, projects.team_id, projects.created_at, projects.end_date, projects.start_date, projects.updated_at
    //     FROM projects, team_users, users
    //     WHERE projects.team_id = team_users.team_id and users.id=team_users.user_id AND users.id = '$id'";
    //   $project = DB::select($sql);
      //print_r($project);


    // }else{
    //     $project = Project::all();
    // }
       
    //print_r(Project::all());
   // exit;

    return view('/projects')->with('projects', $project);
    






}

    public function show(Project $project, Request $request)
    {
        //echo "show projects";

   // return checkTeamUser(1, 3, 'lorenzo');   

        //exit;
       // return $request;

        //return $project;
        $id=$project->id;
        $request->session()->put('projectId', $id);
         $request->session()->put('projectName', $project->name);


         //return getProjectNameSession();
        //return $request->session()->all();
         //$projectName=$request->session()->get('projectName');
        // return $projectName;

        //$value = $request->session()->get('key');


       




        $backlogs=Backlog::all()->where('project_id', $id);

        
        //return $backlogs->count();
         if ($backlogs->count() == 0) {
            // echo "geen backlog/sprints";
            return view('projects.backlog', ['empty' => '1', 'project_id'=>$id] );

           // exit();
        } 



        
        $sprints=Sprint::all()->where('project_id', $id);

      
        $allUsers = User::all();

       



        //$teamusers=Teamusers::all();



        $sql = "SELECT users.name as userName, projects.name  as  projectName, team_users.team_id
FROM users,projects,team_users
where team_users.team_id=projects.team_id and team_users.user_id=users.id
 AND projects.id = '$id'";
    // echo $sql;
    // exit;

        $teamusers = DB::select($sql);

        //return $teamusers;
        //exit();


 if(Auth::user()->rights == 0 )
        {
             return view('Sprintguest', ['project' => $project,
                'backlogs'=>$backlogs, 'sprints'=>$sprints, 'teamusers'=>$teamusers, 'allUsers'=>$allUsers] );
        }


 // if(Auth::user()->rights == 1)
 //        {
 //             return view('Sprintguest', ['project' => $project,
 //                'backlogs'=>$backlogs, 'sprints'=>$sprints, 'teamusers'=>$teamusers, 'allUsers'=>$allUsers] );
 //        }


        if(Auth::user()->rights == 1)
        {
            return view('projects.backlog', ['project' => $project,
                'backlogs'=>$backlogs, 'sprints'=>$sprints, 'teamusers'=>$teamusers, 'allUsers'=>$allUsers] );
        }

      if(Auth::user()->rights == 2)
        {
            return view('projects.backlog', ['project' => $project,
                'backlogs'=>$backlogs, 'sprints'=>$sprints, 'teamusers'=>$teamusers, 'allUsers'=>$allUsers] );
        }



    


    

   
        
}


    

    public function create()
    {

        
        Project::create($this->validateProject());
        

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

        
        
        $input = $request->all();




        $backlog = new Backlog();
        $backlog->moscow = $request->moscow;
        $backlog->description = $request->description;
        $backlog->backlog_item = $request->backlog_item;
        $backlog->deadline = $request->deadline;
        $backlog->project_id = $request->project_id;
        $backlog->save();


        $project_id = $request->project_id;

        return redirect('/projects/' . $project_id);

    }

    public function edit()
    {
        $backlogs=Backlog::all()->where('project_id', $id);
        
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
