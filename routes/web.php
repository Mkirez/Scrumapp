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
use App\Http\Controllers\RetrospectiveItemController;






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
    // Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show']);
    Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('edit_project');
    Route::get('/projects/{project}/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('update_project');
    Route::delete('/projects/{project}/delete', [App\Http\Controllers\ProjectController::class, 'delete'])->name('delete_project');


        //backlog item 
        Route::get('/projects/{project}/backlog_item', [App\Http\Controllers\Backlog_itemController::class, 'index']);
        Route::get('/projects/{project}/backlog_item/{backlog_item}/update', [App\Http\Controllers\Backlog_itemController::class, 'update'])->name('backlog_update');
        Route::get('/projects/{project}/backlog_item/{backlog_item}/delete', [App\Http\Controllers\Backlog_itemController::class, 'delete'])->name('backlog_delete');

        Route::get('/projects/{project}/backlog_item/store', [App\Http\Controllers\Backlog_itemController::class, 'store'])->name('backlog_store');


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
    Route::get('/projects/{project}/sprints/{sprint}/create', [App\Http\Controllers\SprintBacklogController::class, 'create']);
    Route::get('/projects/{project}/sprints/{sprint}/backlog/{backlog_item}/remove', [App\Http\Controllers\SprintBacklogController::class, 'destroy'])->name('remove_backlog');
    Route::get('/projects/{project}/sprints/{sprint}/backlog/{backlog_item}/update', [App\Http\Controllers\SprintBacklogController::class, 'update']);

    // Sprint Retro
    Route::get('/projects/{project}/sprints/{sprint}/retrospective/create', [App\Http\Controllers\RetrospectiveController::class, 'create'])->name('create_retrospective');
    // Sprint Retro Items
    Route::get('/projects/{project}/sprints/{sprint}/retrospective', [App\Http\Controllers\RetrospectiveItemController::class, 'index'])->name('index_retrospectiveitems');


    //retrospective
    Route::get('/projects/{project}/retrospectives', [App\Http\Controllers\RetrospectiveController::class, 'index'])->name('retrospectives');
    Route::get('/projects/{project}/retrospectives/{retrospective}/edit', [App\Http\Controllers\RetrospectiveController::class, 'edit']);
    Route::get('/projects/{project}/retrospectives/{retrospective}/delete', [App\Http\Controllers\RetrospectiveController::class, 'delete']);
    Route::put('/projects/{project}/retrospectives/{retrospective}', [App\Http\Controllers\RetrospectiveController::class, 'update'])->name('update_retrospectives');
    // Route::get('/projects/{project}/retrospectives/create', [App\Http\Controllers\RetrospectiveController::class, 'create'])->name('create_retrospectives');

    //Dailystand
    Route::get('/projects/{project}/dailystands', [App\Http\Controllers\DailystandController::class, 'index'])->name('dailystands');
    Route::get('/projects/{project}/dailystands/{dailystand}/update', [App\Http\Controllers\DailystandController::class, 'update']);
    Route::get('/projects/{project}/dailystands/{dailystand}/delete', [App\Http\Controllers\DailystandController::class, 'delete'])->name('delete_dailystands');
    Route::put('/projects/{project}/dailystands/{dailystand}', [App\Http\Controllers\DailystandController::class, 'update'])->name('update_dailystands');
    Route::get('/projects/{project}/dailystands/create', [App\Http\Controllers\DailystandController::class, 'create'])->name('create_dailystands');

    //DailystandItems

    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items', [App\Http\Controllers\DailystandItemController::class, 'index']);
    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items/{dailystand_item}/update', [App\Http\Controllers\DailystandItemController::class, 'update'])->name('update_dailystanditems');
    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items/{dailystand_item}/delete', [App\Http\Controllers\DailystandItemController::class, 'delete'])->name('delete_dailystanditems');
    Route::get('/projects/{project}/dailystands/{dailystand}/dailystand_items/create', [App\Http\Controllers\DailystandItemController::class, 'create']);

    // Route::resource('backlog', Backlog_itemController::class);

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
