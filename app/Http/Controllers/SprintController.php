<?php

namespace App\Http\Controllers;

use App\Models\Backlog_item;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;

class SprintController extends Controller
{
    public function index(Project $project, Sprint $sprints)
    {



        $sprints = $project->sprints;



        return view('projects.sprint', compact('project', 'sprints'));
    }


    public function create()
    {
        $sprint = Sprint::create($this->validateSprint());

        return back();
    }




    public function edit(Project $project, Sprint $sprint, Backlog_item $backlog_item)
    {
        if ($backlog_item->status =='todo') {
               $backlog_item->find($backlog_item);
        $backlog_item->status = 'busy';
        $backlog_item->save();
        }
        elseif ($backlog_item->status =='busy') {
               $backlog_item->find($backlog_item);
        $backlog_item->status = 'done';
        $backlog_item->save();
        }
        elseif ($backlog_item->status =='done') {
               $backlog_item->find($backlog_item);
        $backlog_item->status = 'todo';
        $backlog_item->save();
        }
        return back();
     


       
      

    }

    public function update(Project $project, Sprint $sprint)
    {
        $sprint->update($this->validateSprint());
        return back();
    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();

        return back();
    }

    protected function validateSprint()
    {
        return request()->validate([
            'name' => 'required',
            'project_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
    }

      

}
