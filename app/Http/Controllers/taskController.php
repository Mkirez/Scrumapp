<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\DB;// DAN KAN Je gebruik maken van queries 


class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function insertUser(Request $request){


       // return $request;
        // exit();
        $updateUser = task::find($request->task_id)->update(['team_user_id'=>$request->name

        ]);


        $project='zomaar';

         return redirect('sprints')->with('project', $project);

      



        // return $request;
    }
    public function insertTaskToSprint(Request $request){
        

        //return $request;

        if (isset($request->backlog_id)){
        $backlog_id=$request->backlog_id;
       // return $backlog_id;
        $projects_id= $request->projects_id;
      // exit();

        $task = new task();


        $task->remarks = '-';
        $task->status = 'todo';
        //$task->team_user_id = '1';
        $task->sprint_id =$request->sprint_id;
        $task->save();

        $lastId=DB::getPdo()->lastInsertId();
        // return $lastId;

        $updateItem = Backlog::find($backlog_id)->update(['task_id'=> $lastId]);
    }else{

        return $request;
    }



               return redirect('/projects/' . $projects_id);

        // return $request;

         return redirect('sprints');
       

        echo "ök";
    }
}
