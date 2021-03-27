<?php

namespace App\Http\Controllers;

use App\Models\Backlog_item;
use App\Models\Project;
use App\Models\Sprint;
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


    public function store(Backlog_item $backlog_item)
    {

    }

    public function show(Project $project, Sprint $sprint)
    {
        // search all backlog items in current sprint.
        $not_in_sprint_backlog_items = Backlog_item::where('project_id', $project->id)
            ->where('sprint_id', null)
            ->get();

        //  all backlog items in sprint
        $in_sprint_backlog_items = $project->backlog_items->where('sprint_id', $sprint->id);

        // dd($in_sprint_backlog_items->pluck('backlog_item'));

        return view('sprint.show', compact('not_in_sprint_backlog_items', 'in_sprint_backlog_items', 'project'));
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
