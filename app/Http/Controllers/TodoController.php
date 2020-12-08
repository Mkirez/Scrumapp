<?php

namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = Users::latest()->get();
        return view('profile')->with('users', $users);
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
            'user' => 'required|max:255',
        ]);


        $todo = todo::create([
            'user' => $request->user,
            'completed'=> 0,
        ]);


        

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $user)
    {
      
      return view('edit')->with('Users', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {

        $user->update($request->all());  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user,  $id)
    {

        
        $sql = "DELETE FROM users WHERE id=$id";




        $profile = DB::update($sql);
        return view('/welcome');



        
        
    }
}
