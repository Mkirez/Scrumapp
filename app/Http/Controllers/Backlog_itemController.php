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

        return view('backlog_items.index', ['backlog_items' => $backlog_items]);
    }

    public function create(Project $project)
    {
        // dd($project->);
        return view('backlog_items.create', compact('project'));
    }

    public function store(Project $project)
    {
        dd($project);
        Backlog_item::create($this->validateBacklog_item());
        return redirect('/projects/{{$project->id}}/backlog_items'); // uri klopt niet
    }


    protected function validateBacklog_item()
    {
        return request()->validate([
            'project_id' => 'required',
            'name' => 'required'
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
