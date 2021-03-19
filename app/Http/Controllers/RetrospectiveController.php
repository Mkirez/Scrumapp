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
    public function index(Project $project )
    {

        $retrospectives = $project->retrospectives;

        return view('projects.retrospective', compact('project', 'retrospectives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Retrospective::create($this->validateRetro());

        return back();
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
    public function edit(Project $project, Retrospective $retrospective)
    {

        return view('projects.retro.edit', compact('project', 'retrospective'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Retrospective $retrospective)
    {
        // dd(request());
        $retrospective->update($this->validateRetro());

        return back();
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

    protected function validateRetro()
    {
        return request()->validate([
            'project_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
    }
}
