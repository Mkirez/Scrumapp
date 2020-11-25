<?php

namespace App\Http\Controllers;

use App\Models\ProjectInfo as ModelsProjectInfo;
use App\Models\ProjectInfo;
use Illuminate\Http\Request;

class ProjectInfoController extends Controller
{
    
    public function index() {
      $projectinfos = ProjectInfo::all();
      
      return view('projectinfo.InfoMenu', [
          'projectinfos' => $projectinfos,
      ]);
    }
    
    // public function index(){
    //     return view('projectinfo.InfoMenu',
    //     ['id' => $id]);
    // }
}
