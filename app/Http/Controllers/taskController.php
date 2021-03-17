<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\DB;// DAN KAN Je gebruik maken van queries 


class taskController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function destroy($id)
    {
        //
    }

    public function insertUser(Request $request){
     // return $request;
    $sprintId=request()->sprint_id;
    // exit();



    $updateUser = task::find($request->task_id)->update(['team_user_id'=>$request->name ]);



        
         $project='zomaar';
    $update = task::find($request->task_id);
    // return $update;




         return redirect('sprints/'. $sprintId)->with('project', $project);

      



        // return $request;
    }
    public function insertTaskToSprint(Request $request){
        





        $sprintId=request()->sprint_id;
        //return $request;

        if (isset($request->backlog_id)){
        $backlog_id=$request->backlog_id;
       // return $backlog_id;
        $projects_id= $request->projects_id;

        $sprint_id= $request->sprint_id;
        
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




         return redirect('sprints/'. $sprintId . '/edit');
    
        return back();
               

        // return $request;

         // return redirect('sprints');
       

        echo "ök";
    }
}
