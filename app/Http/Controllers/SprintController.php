<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Teamusers;
use App\Models\Sprint;
use App\Models\Backlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;// DAN KAN Je gebruik maken van queries 

class SprintController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
         $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description, backlog_items.id
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id";

        $dataSprint = DB::select($sql);

//////////////////////////////////////////////////////////////

        


        $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id and task.status='todo'";
    



    $dataTodo = DB::select($sql);

///////////////////////////////////////////////////////////////

       $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id and task.status='busy'";
    

    $dataBusy = DB::select($sql);
/////////////////////////////////////////////////////////////////

     $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id and task.status='done'";
    

    $dataDone = DB::select($sql);


        return view('sprint')->with('dataSprint',$dataSprint)->with('dataTodoe',$dataTodo)->with('dataBusy',$dataBusy)->with('dataDone',$dataDone);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();




        $backlog = new Sprint();
        $backlog->remarks = $request->remarks;
        $backlog->created_at = $request->created_at;
        $backlog->updated_at = $request->updated_at;
        $backlog->project_id = $request->project_id;
        $backlog->save();


        $project_id = $request->project_id;

        // return redirect('/projects/' . $project_id. 'project:');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description, backlog_items.id
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id";

        $dataSprint = DB::select($sql);

//////////////////////////////////////////////////////////////

        


        $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id and task.status='todo'";
    



    $dataTodo = DB::select($sql);

///////////////////////////////////////////////////////////////

       $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id and task.status='busy'";
    

    $dataBusy = DB::select($sql);
/////////////////////////////////////////////////////////////////

     $sql = "SELECT task.status, team_users.user_id, users.name, backlog_items.description
From task, team_users, users, backlog_items
where task.team_user_id=team_users.id and team_users.user_id=users.id and backlog_items.task_id=task.id and task.status='done'";
    

    $dataDone = DB::select($sql);


        return view('sprint')->with('dataSprint',$dataSprint)->with('dataTodoe',$dataTodo)->with('dataBusy',$dataBusy)->with('dataDone',$dataDone);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      // // echo "edit";
     // echo  $id;
     //    exit;
        //return getProjectId($id);



        
        // dd('edit');
         $project_id= request()->project_id;
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
        echo "update id:".$id."<br>";
        //return $request->input();
        if ($request->option == 'done'){
            echo "veld veranderen in done";

            $sql = "UPDATE task
                    set status ='done'
                    WHERE id = $id";



            $dataSprint = DB::Update($sql);
            return redirect('/sprints');
            




            // sql veld updaten
        }
        if ($request->option == 'busy'){
            $sql = "UPDATE task
                    set status ='busy'
                    WHERE id = $id";


            $dataSprint = DB::Update($sql);
            return redirect('/sprints');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
