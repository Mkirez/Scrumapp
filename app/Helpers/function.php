<?php 

use Illuminate\Http\Request;

function getSprint($task_id, $project_id){




if ($task_id == NULL) {
	return 'geen ';
}else{

	$sql = "SELECT sprints.remarks 
FROM sprints, task 
WHERE sprints.project_id = '$project_id' AND task.sprint_id = sprints.id AND task.id = '$task_id'";
// return $task_id."--".$project_id;

$data = DB::select($sql);






return $data[0]->remarks;

}




}


function  getProjectId($sprintId){
	$sql="SELECT project_id from sprints  WHERE sprints.id='$sprintId' ";
	$data= DB::select($sql);
	return $data[0]->project_id;

}

function  getTeamId($projectId){
	$sql="SELECT team_id from projects  WHERE projects.id='$projectId' ";
	$data= DB::select($sql);
	return $data[0]->team_id;

}


function  getSprintName($sprint_id){
	$sql="SELECT remarks from sprints  WHERE id='$sprint_id' ";
	$data= DB::select($sql);
	return $data[0]->remarks;

}

function checkTeamUser($user_id, $team_id, $userName){



	$sql="SELECT users.id, users.name
from users, team_users
where team_users.user_id=users.id and team_users.team_id='$team_id' and team_users.user_id='$user_id'";
//echo $sql;
//exit;


$data = DB::select($sql);
$outstr="<option value='0' style='display:none; text-decoration:underline;'>".$userName."</option>";
//return $data;

if ($data){
	//return $data;
	echo $outstr;
}else{
	//return "bestaat niet";<s>".$userName."</s>";
	echo "<option value='$user_id'>" .$userName . "</option>";
}
//return;


}
function getProjectIdSession(){
	//return $request->session()->all();
         //$projectName=$request->session()->get('projectName');
        // return $projectName;

        //$value = $request->session()->get('key');//return $request->session()->all();
         //$projectName=$request->session()->get('projectName');
        // return $projectName;

        //$value = $request->session()->get('key');
	// if (isset($request->session()))
	if (request()->session()->exists('projectId')) {
		return request()->session()->get('projectId');
    //
	}else{
		return 0;

	}

	//if (request()->session()->has('projectId')) {
	//	return request()->session()->get('projectId');
	//}else { 
	//	return redirect('/projects');
	//}
}


function getProjectNameSession(){
	//return $request->session()->all();
         //$projectName=$request->session()->get('projectName');
        // return $projectName;

        //$value = $request->session()->get('key');//return $request->session()->all();
         //$projectName=$request->session()->get('projectName');
        // return $projectName;

        //$value = $request->session()->get('key');
	// if (isset($request->session()))
	//return request()->session()->all();
		if (request()->session()->exists('projectName')) {
			//echo "bestaal";
		return request()->session()->get('projectName');
	}else {

		return 0;
		//echo "bestaat niet";

	}
	return;
}



function asmaskasms(){
	echo "string";
}