<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;// DAN KAN Je gebruik maken van queries 

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function test(){


        echo "test";


    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
