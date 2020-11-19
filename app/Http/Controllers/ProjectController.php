<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = projects::all();

        return view('/projects', ['projects' => $projects]);
    }

    public function show()
    {
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        // dump(request()->all());
        // die('hello');
        projects::create($this->validateProject());
        
        

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
            'naam' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
    }
}
