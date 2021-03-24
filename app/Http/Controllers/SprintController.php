<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Http\Request;
use Auth;

class SprintController extends Controller
{
    public function index(Project $project)
    {
        $sprints = $project->sprints;

        return view('projects.sprint', compact('project', 'sprints'));
    }


    public function create()
    {
        $sprint = Sprint::create($this->validateSprint());

        return back();
    }


    public function store()
    {
        //
    }

    public function show()
    {
        //
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
