<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Teamusers;
use App\Models\Sprint;
use App\Models\Backlog;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\DB;// DAN KAN Je gebruik maken van queries 


//deze 2 uses zorgen ervoor dat zodra je return back gebruikt je de id mee gestuurd krijgt net een sessie
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\URL;

class SprintController extends Controller
{


    public function index(Project $project)
    {
        $sprints = $project->sprints;
        

        return view('projects.sprint', compact('project', 'sprints'));
        
    }


    public function create()
    {
        $sprint = Sprint::create($this->validateSprints());

        return back();
    }

   
    public function store(Request $request)
    {
       echo "string";
    }


    public function show($id)
    {
       
         echo "show";
    }
    public function edit($id)
    {
        
        // dd('edit');
        // $project_id= request()->project_id;
        $project_id = getProjectId($id);

         //echo "";

         $team_id= getTeamId($project_id);
         $sprint_id=$id;
        // return $team_id;



        $sql = " SELECT * from backlog_items where project_id='$project_id' ";
        //echo $sql;
        //exit;
        $items=DB::select($sql);
        //return $items;



///////////////////////////////////////////////////////////////////////////////////////////


    $sql ="SELECT users.name, users.id
from team_users, users,team,projects
where team_users.team_id=team.id and team_users.user_id=users.id and projects.team_id=team.id and projects.team_id='$team_id'";


        $teamusers=DB::select($sql);
        //return $teamusers;



        
        // return $backlogs->count();
        


        $sql = "SELECT backlog_items.id, backlog_items.project_id, backlog_items.deadline, backlog_items.moscow, backlog_items.description,backlog_items.backlog_item, backlog_items.task_id
                from backlog_items, task, sprints
                where task.sprint_id=sprints.id and backlog_items.task_id=task.id and sprints.id='$id'";


                $backlog = DB::select($sql);
                if ($backlog){
                 //echo "is ok";
                 //return;
                   // $teamusers = DB::select($sql);
            return view('edit', ['backlogs'=>$backlog, 'teamusers'=>$teamusers, 'sprint_id'=>$id, 'items'=>$items,'team_id'=>$team_id ] );
                }else {
                   // echo "geeen data";
                    //return;
                    $backlogLeeg=['name'=>'-', 'id'=>'-'];
              return view('edit', ['backlogsll'=>$backlogLeeg, 'teamusers'=>'-', 'sprint_id'=>$id, 'empty'=>'1', 'items'=>$items, 'project_id'=>$project_id, 'team_id'=>$team_id] );
                }
               // return;
                //oude versie
                // $name = ($name, 'name')->with();

        //$backlog=backlog::all()->where('project_id', $id);

        // echo ($sprints);
        }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo "ïd is ".$id."<br>"; 
        //return $request;
       
        if ($request->option == 'done'){
            // echo "veld veranderen in done";

            $sql = "UPDATE task
                    set status ='done'
                    WHERE id = $id";



            $dataSprint = DB::Update($sql);
            return back();
            




            // sql veld updaten
        }
        if ($request->option == 'busy'){
            $sql = "UPDATE task
                    set status ='busy'
                    WHERE id = $id";


            $dataSprint = DB::Update($sql);
            return back();


        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, request $request)
    {
        $sql = "DELETE FROM sprints WHERE id=$id";




        $sprints = DB::update($sql);

       
         

        return back();
    }

    protected function validateSprints()
    {
        return request()->validate([
            'remarks' => 'required',
            'project_id' => 'required',
           
        ]);
    }
}
