<?php

namespace App\Http\Controllers;

use App\Models\Dailystand_item;
use App\Models\Dailystand;
use App\Models\Project;
use Illuminate\Http\Request;

class DailystandItemController extends Controller
{
   
    public function index(Project $project, Dailystand $dailystand)
    {

        $dailystand_items = $dailystand->dailystand_items;  

        return view('projects.dailystanditems', compact('dailystand_items', 'project', 'dailystand'));
    }

    
    public function create(Project $project, Dailystand $dailystand)
    {
        Dailystand_item::create($this->validateDailyItem());
        
       
        return back();

        
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show(Dailystand_item $dailystand_item)
    {
        //
    }

    
   
    public function edit(Dailystand_item $dailystand_item)
    {
        //
    }

    
    public function update(Request $request, Dailystand_item $dailystand_item)
    {
        $dailystand_item->update($this->validateDailyItem());

        return back();
    }

    
    public function delete(Dailystand_item $dailystand_item)
    {

        $dailystand_item->delete();

        return back();
        
    }


    protected function validateDailyItem()
    {
        return request()->validate([
            'description' => 'required',
            'status' => 'required',
            'dailystand_id' => 'required',
        ]);
    }

}
