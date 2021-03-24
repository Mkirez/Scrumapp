<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retrospective;
use App\Models\Project;

class RetrospectiveController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Project $project)
    {

        $retrospectives = $project->retrospectives;

        return view('projects.retrospective', compact('project', 'retrospectives'));
    }

    public function create()
    {

        Retrospective::create($this->validateRetro());

        return back();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Project $project, Retrospective $retrospective)
    {

        return view('projects.retro.edit', compact('project', 'retrospective'));
    }

    public function update(Project $project, Retrospective $retrospective)
    {
        // dd(request());
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
            'project_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
    }
}
