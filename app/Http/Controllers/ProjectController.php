<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::User()->projects;

        return view('projects', compact('projects'));
    }

    public function show(Project $project)
    {
        $backlog_items = $project->backlog_items;
        $sprints = $project->sprints;
        $allUsers = $project->users;

        return view('projects.backlog', compact('project', 'backlog_items', 'sprints', 'allUsers'));
    }

    public function create()
    {
        $id = Auth()->user();
        $project = Project::create($this->validateProject());
        $project->users()->attach($id);

        return back();
    }

    public function store()
    {
        //
    }

    public function edit(Project $project)
    {

        return view('projects.editProject', compact('project'));
    }

    public function update(Project $project)
    {

        //
        
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
