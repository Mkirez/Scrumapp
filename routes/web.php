<?php

use Illuminate\Support\Facades\Route;



//controllers

use App\Http\Controllers\SprintBacklogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Backlog_itemController;
use App\Http\Controllers\ProjectInfoController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\teamUserController;
use App\Http\Controllers\RetrospectiveController;
use App\Http\Controllers\DailystandController;
use App\Http\Controllers\DailystandItemController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


// je moet auth zijn dus ingelogd zijn anders word je naar inlog gestuurd
Route::middleware('auth')->group(function () {

    Route::resource('profile', ProfileController::class);

    //projecten
    Route::get('/projects/', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create']);
    Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show']);
    Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('edit_project');
    Route::get('/projects/{project}/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('update_project');
    Route::delete('/projects/{project}/delete', [App\Http\Controllers\ProjectController::class, 'delete'])->name('delete_project');


    //teammembers
    Route::get('/projects/{project}/teamember', [App\Http\Controllers\teamUserController::class, 'index'])->name('teamember');
    Route::get('/projects/{project}/teamember/create', [App\Http\Controllers\teamUserController::class, 'create'])->name('teamember_create');
    Route::get('/projects/{project}/teamember/{user}/remove', [App\Http\Controllers\teamUserController::class, 'delete'])->name('teamember_delete');

    //sprints
    Route::get('/projects/{project}/sprints', [App\Http\Controllers\SprintController::class, 'index'])->name('sprints');
    Route::get('/projects/{project}/sprints/create', [App\Http\Controllers\SprintController::class, 'create'])->name('create_sprints');
    Route::get('/projects/{project}/sprints/{sprint}/store', [App\Http\Controllers\SprintController::class, 'store']);
    Route::get('/projects/{project}/sprints/{sprint}/update', [App\Http\Controllers\SprintController::class, 'update'])->name('update_sprint');;

    // Sprint backlog
    Route::get('/projects/{project}/sprints/{sprint}', [App\Http\Controllers\SprintBacklogController::class, 'index'])->name('Showsprints');
    Route::get('/projects/{project}/sprints/{sprint}/backlog/{backlog_item}/remove', [App\Http\Controllers\SprintBacklogController::class, 'destroy']);
    Route::get('/projects/{project}/sprints/{sprint}/backlog/{backlog_item}/update', [App\Http\Controllers\SprintBacklogController::class, 'update']);

    //retrospective
    Route::get('/projects/{project}/retrospectives', [App\Http\Controllers\RetrospectiveController::class, 'index'])->name('retrospectives');
    Route::get('/projects/{project}/retrospectives/{retrospective}/edit', [App\Http\Controllers\RetrospectiveController::class, 'edit']);
    Route::get('/projects/{project}/retrospectives/{retrospective}/delete', [App\Http\Controllers\RetrospectiveController::class, 'delete']);
    Route::put('/projects/{project}/retrospectives/{retrospective}', [App\Http\Controllers\RetrospectiveController::class, 'update'])->name('update_retrospectives');
    Route::get('/projects/{project}/retrospectives/create', [App\Http\Controllers\RetrospectiveController::class, 'create'])->name('create_retrospectives');

    //Dailystand
    Route::get('/projects/{project}/dailystands', [App\Http\Controllers\DailystandController::class, 'index'])->name('dailystands');
    Route::get('/projects/{project}/dailystands/{dailystand}/update', [App\Http\Controllers\DailystandController::class, 'update']);
    Route::get('/projects/{project}/dailystands/{dailystand}/delete', [App\Http\Controllers\DailystandController::class, 'delete']);
    Route::put('/projects/{project}/dailystands/{dailystand}', [App\Http\Controllers\DailystandController::class, 'update'])->name('update_dailystands');
    Route::get('/projects/{project}/dailystands/create', [App\Http\Controllers\DailystandController::class, 'create'])->name('create_dailystands');

    //DailystandItems

    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items', [App\Http\Controllers\DailystandItemController::class, 'index']);
    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items/{dailystand_item}/update', [App\Http\Controllers\DailystandItemController::class, 'update']);
    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items/{dailystand_item}/delete', [App\Http\Controllers\DailystandItemController::class, 'delete']);
    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items/create', [App\Http\Controllers\DailystandItemController::class, 'create']);


    //Backlog
    Route::resource('backlog', Backlog_itemController::class);

    // Route::resource('Sprintguest', SprintguestController::class);

    Route::post('/taskInsertUser', [App\Http\Controllers\taskController::class, 'insertUser'])->name('taskInsertUser');

    Route::post('/insertTaskToSprint', [App\Http\Controllers\taskController::class, 'insertTaskToSprint'])->name('insertTaskToSprint');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Retrospective

    // Route::resource('retrospective', RetrospectiveController::class);
});


Route::get('/', function () {
    return view('welcome');
});
