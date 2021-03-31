<?php

namespace App\Http\Controllers;

use App\Models\Backlog_item;
use App\Models\Project;
use App\Models\Sprint;

use Illuminate\Http\Request;

class SprintBacklogController extends Controller
{
    public function index(Project $project, Sprint $sprint,Backlog_item $backlog_item)
    {
        // search all backlog items in current sprint.
        $not_in_sprint_backlog_items = Backlog_item::where('project_id', $project->id)
            ->where('sprint_id', null)
            ->get();

        //  all backlog items in sprint
        $in_sprint_backlog_items = $project->backlog_items->where('sprint_id', $sprint->id);

        $in_project_users = $project->users_in_project();
        // dd($users_in_project);


        return view('sprint.show', compact('not_in_sprint_backlog_items', 'in_sprint_backlog_items', 'project','backlog_item','sprint', 'in_project_users'));
    }

    public function create(Project $project, Sprint $sprint, Request $request)
    {
        $backlog_item = Backlog_item::find($request->backlog_item);
        $backlog_item->add_to_sprint($sprint);

        if($request->user_id) { $backlog_item->user_id = $request->user_id;}

        if($request->bv) { $backlog_item->bv = $request->bv;}

        $backlog_item->save();

        return back();
    }

    public function update(Project $project, Sprint $sprint, Request $request)
    {
        $backlog_item = Backlog_item::find($request->backlog_item);
        $backlog_item->user_id = $request->user_id;
        
        if($request->status) { $backlog_item->status = $request->status; }

        if($request->bv) { $backlog_item->bv = $request->bv;}

        $backlog_item->save();

        return back();
    }

    public function destroy(Project $project, Sprint $sprint, Backlog_item $backlog_item)
    {
        $backlog_item->remove_from_sprint();
        return back();
    }
}
