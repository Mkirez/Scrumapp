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

       
    }


    public function store(Project $project, Sprint $sprint, Request $request )
    {

   
        $backlog_item = backlog_item::find($request->backlog_item);
        $backlog_item->added_to_sprint = 1;
        $backlog_item->sprint_id = $sprint->id;
        $backlog_item->sprint_id = $sprint->id;
        $backlog_item->save();
        return back();






        

    }

    public function show(Project $project, Sprint $sprint,Backlog_item $backlog_item)
    {

       



        // search all backlog items in current sprint.
        $not_in_sprint_backlog_items = Backlog_item::where('project_id', $project->id)
            ->where('sprint_id', null)
            ->get();

        //  all backlog items in sprint
        $in_sprint_backlog_items = $project->backlog_items->where('sprint_id', $sprint->id);

        // dd($in_sprint_backlog_items->pluck('backlog_item'));

        return view('sprint.show', compact('not_in_sprint_backlog_items', 'in_sprint_backlog_items', 'project','backlog_item','sprint'));
    }

    public function edit()
    {
        //
    }

    public function update(Request $request, $id)
    {
        if ($request->option == 'done') {
            // echo "veld veranderen in done";

            $sql = "UPDATE task
                    set status ='done'
                    WHERE id = $id";

            $dataSprint = DB::Update($sql);
            return back();

            // sql veld updaten
        }
        if ($request->option == 'busy') {
            $sql = "UPDATE task
                    set status ='busy'
                    WHERE id = $id";

            $dataSprint = DB::Update($sql);
            return back();
        }
    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();

        return back();
    }

    protected function validateSprint()
    {
        return request()->validate([
            'remarks' => 'required',
            'project_id' => 'required',
        ]);
    }

      

}
