<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\retrospective_item;
use App\Models\Project;
use App\Models\Sprint;

class RetrospectiveItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Project $project, Sprint $sprint)
    {

        $retrospective_items = $sprint->retrospective_items;


        return view('projects.retrospective_items',compact('retrospective_items','project','sprint'));
    }

 public function create(Project $project, Sprint $sprint)
    {   


        retrospective_item::create($this->validateRetro());

   
    

        return back();
    }



  

    public function store(Request $request)
    {
        
    }

    public function show(Project $project, Sprint $sprint)
    {
        $retrospective = $sprint->retrospective;

        return view('projects.retrospective', compact('project', 'retrospective'));
    }

 

    public function update(Project $project,Sprint $sprint, Retrospective_item $retrospective_item)
    {
        
        $retrospective_item->update($this->validateRetro());

   

        return back();
    }
    
    public function delete(Project $project,Sprint $sprint,Retrospective_item $retrospective_item)
    {


        $retrospective_item->delete();

        return back();
    }

    protected function validateRetro()
    {
        return request()->validate([
            'sprint_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
    }
}
