<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retrospective;
use App\Models\Project;
use App\Models\Sprint;

class RetrospectiveController extends Controller
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

    public function create(Project $project, Sprint $sprint)
    {
        
        $retrospective = new Retrospective;
        $retrospective->sprint_id = $sprint->id;
        $retrospective->save();
        
        
        
        return redirect(route('index_retrospectiveitems' ,[$project->id, $sprint->id]));
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Project $project, Sprint $sprint)
    {
        $retrospective = $sprint->retrospective;

        return view('projects.retrospective', compact('project', 'retrospective'));
    }

    public function edit(Project $project, Retrospective $retrospective)
    {

        return view('projects.retro.edit', compact('project', 'retrospective'));
        
    }

    public function update(Project $project, Retrospective $retrospective)
    {
        
        $retrospective->update($this->validateRetro());

        return back();
    }
    
    public function delete(Project $project,   Retrospective $retrospective)
    {
        $retrospective->delete();

        return back();
    }

    protected function validateRetro()
    {
        return request()->validate([
            'sprint_id' => 'required',
        ]);
    }
}
