<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = projects::all();
        //return view('projects');
        return view('projects')->with('data', $data);
        // return view('welcome')->with('todos', $todos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validataData = $request->validate([
            'naam' => 'required|max:255',
        ]);



        $projects = project::create([
            'naam' => $request->projects,
        ]);



        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
      
      return view('todo.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, todo $todo)
    // {
    //     $todo->update($request->all());

    //     return redirect('/');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }
}
