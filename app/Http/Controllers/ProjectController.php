<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        if(Auth::User()->is_admin == 1){
            $projects = Project::all();
        } else {
            $projects = Auth::User()->projects;
        }

        return view('projects', compact('projects'));
    }

    public function create()
    {
        $id = Auth()->user();
        $project = Project::create($this->validateProject());
        $project->users()->attach($id);

        $project->users()->updateExistingPivot($id, ['project_right' =>2,]);


        return back();
    }

    public function store()
    {
        //
    }

    public function edit(Project $project)
    {

        //return view('projects.editProject', compact('project'));

    }

    public function update(Project $project)
    {

        //dd($project->start_date);
        
        $project->update($this->validateProject());

        return back();
    }

    public function delete(Project $project)
    {

        $project->delete();

        return back();
        
    }

    protected function validateProject()
    {
        return request()->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
    }

}
