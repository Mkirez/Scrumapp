<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use App\Models\Project;
use Illuminate\Http\Request;

class Backlog_itemController extends Controller
{
    public function index(Project $project)
    {
        $backlog_items = $project->backlog_items;

        return view('projects.backlog', compact('backlog_items', 'project'));
    }

    public function create()
    {
        
    }

    public function store()
    {
        Backlog::create($this->validateBacklog_item());
        return back();
    }
    
    public function edit()
    {
        //
    }
    
    public function update()
    {
        //
    }

    protected function validateBacklog_item()
    {
        return request()->validate([
            'project_id' => 'required',
            'description' => 'required',
            'backlog_item' => 'required',
            'moscow' => 'required',
            'deadline' => 'required',
        ]);
    }
}
