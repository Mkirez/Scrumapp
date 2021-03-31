<?php

namespace App\Http\Controllers;

use App\Models\Backlog_item;
use App\Models\Project;
use Illuminate\Http\Request;

class Backlog_itemController extends Controller
{
     public function index(Project $project)
    {
        $backlog_items = $project->backlog_items;
        
        $sprints = $project->sprints;
        $allUsers = $project->users;

        return view('projects.backlog', compact('project', 'backlog_items', 'sprints', 'allUsers'));
    }

    public function create()
    {
        
    }

    public function store()
    {
        // dd(request());
        Backlog_item::create($this->validateBacklog_item());
        return back();
    }
    
    public function edit()
    {
        //
    }
     public function delete(Project $project, Backlog_item $backlog_item)
    {
        $backlog_item->delete();

        return back();
    }
    
    
    public function update(Project $project, Backlog_item $backlog_item)
    {
        $backlog_item->update($this->validateBacklog_item());
    }

    protected function validateBacklog_item()
    {
        return request()->validate([
            'project_id' => 'required',
            'description' => 'required',
            'name' => 'required',
            // 'moscow' => 'required',
            // 'deadline' => 'required',
            // 'sprint_id' => 'required',
        ]);
    }
}
