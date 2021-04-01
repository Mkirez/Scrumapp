<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dailystand;
use App\Models\Project;

class DailystandController extends Controller
{


    public function index(Project $project)
    {

        $dailystands = $project->dailystands;


        return view('projects.dailystand', compact('project', 'dailystands'));
    }

    public function create()
    {

        Dailystand::create($this->validateDaily());

        return back();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Project $project)
    {
        $dailystands = $project->dailystands;

        return view('projects.backlog', compact('dailystands'));
    }

    public function edit(Project $project, Dailystand $dailystand)
    {

        return view('projects.daily.edit', compact('project', 'dailystand'));
    }

    public function update(Project $project, Dailystand $dailystand)
    {

        $dailystand->update($this->validateDaily());

        return back();

        
    }

    public function delete(Project $project,   Dailystand $dailystand)
    {
        $dailystand->delete();

        return back();
    }

    protected function validateDaily()
    {
        return request()->validate([
            'project_id' => 'required',
            'name' => 'required',
            'created_date' => 'required',
        ]);
    }
}
