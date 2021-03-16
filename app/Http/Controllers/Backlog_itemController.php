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

    public function create(Project $project)
    {
        // $backlog = new Backlog();
        // $backlog->moscow = $request->moscow;
        // $backlog->description = $request->description;
        // $backlog->backlog_item = $request->backlog_item;
        // $backlog->deadline = $request->deadline;
        // $backlog->project_id = $request->project_id;
        // $backlog->save();
        return view('backlog_items.create', compact('project'));
    }

    public function store(Project $project)
    {
        // dd($project);
        Backlog::create($this->validateBacklog_item());
        return back();
        // return redirect('/projects/{{$project->id}}/backlog_items'); // uri klopt niet
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

    // public function edit()
    // {
    //     //
    // }

    // public function update()
    // {
    //     //
    // }
}
