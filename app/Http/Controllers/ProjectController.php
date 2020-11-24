<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('/projects', ['projects' => $projects]);
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        // dump(request()->all());
        // die('hello');
        Project::create($this->validateProject());
        
        return redirect('/projects');
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
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
