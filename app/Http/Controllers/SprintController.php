<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Http\Request;
use Auth;

class SprintController extends Controller
{
    public function index(Project $project)
    {
        $sprints = $project->sprints;

        return view('projects.sprint', compact('project', 'sprints'));
    }


    public function create()
    {
        $sprint = Sprint::create($this->validateSprints());

        return back();
    }


    public function store()
    {
        //
    }

    public function show()
    {
        //
    }
    public function edit($id)
    {

        $project_id = getProjectId($id);

        $team_id = getTeamId($project_id);
        $sprint_id = $id;

        $sql = " SELECT * from backlog_items where project_id='$project_id' ";
        $items = DB::select($sql);

        $sql = "SELECT users.name, users.id
from team_users, users,team,projects
where team_users.team_id=team.id and team_users.user_id=users.id and projects.team_id=team.id and projects.team_id='$team_id'";

        $teamusers = DB::select($sql);

        $sql = "SELECT backlog_items.id, backlog_items.project_id, backlog_items.deadline, backlog_items.moscow, backlog_items.description,backlog_items.backlog_item, backlog_items.task_id
                from backlog_items, task, sprints
                where task.sprint_id=sprints.id and backlog_items.task_id=task.id and sprints.id='$id'";

        $backlog = DB::select($sql);
        if ($backlog) {
            return view('edit', ['backlogs' => $backlog, 'teamusers' => $teamusers, 'sprint_id' => $id, 'items' => $items, 'team_id' => $team_id]);
        } else {
            $backlogLeeg = ['name' => '-', 'id' => '-'];
            return view('edit', ['backlogsll' => $backlogLeeg, 'teamusers' => '-', 'sprint_id' => $id, 'empty' => '1', 'items' => $items, 'project_id' => $project_id, 'team_id' => $team_id]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->option == 'done') {
            // echo "veld veranderen in done";

            $sql = "UPDATE task
                    set status ='done'
                    WHERE id = $id";

            $dataSprint = DB::Update($sql);
            return back();

            // sql veld updaten
        }
        if ($request->option == 'busy') {
            $sql = "UPDATE task
                    set status ='busy'
                    WHERE id = $id";

            $dataSprint = DB::Update($sql);
            return back();
        }
    }

    public function destroy($id, request $request)
    {
        $sql = "DELETE FROM sprints WHERE id=$id";

        $sprints = DB::update($sql);

        return back();
    }

    protected function validateSprints()
    {
        return request()->validate([
            'remarks' => 'required',
            'project_id' => 'required',
        ]);
    }
}
