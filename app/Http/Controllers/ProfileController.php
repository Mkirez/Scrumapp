<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



         $user = Auth::User();

        // return $users->name;


         $users= User::all(); 

        // return $users;
        // return $users[0]->email;


    if(Auth::user()->stakeholder())
        {

        return view('profileUser',compact('user'));

        }

    if(Auth::user()->team_member())
        {

        return view('profileUser',compact('user'));
        }

    if(Auth::user()->product_owner())

    {

        return view('profileAdmin',compact('user','users'))->with('rightStr0','')->with('rightStr1','');
    }



    }

   
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
    public function edit($id)
     {
        //aangepast naar find or fail
         $user = User::findorfail($id);
         $users= User::all(); 
        return view('profileAdmin')->with('user', $user)->with('users',$users);

    }

  
    public function update(Request $request, $id)
    {

        request()->validate([
         'rights' => 'required',
            'name' => 'required',
        ]);
            $user = User::find($id);
            $user->name = $request->name;
            $user->rights = $request->rights;
            $user->save();
            return redirect('/profile');
    }
        
 
    public function destroy($id)
    {
       
        User::destroy($id);
        
        return view('/welcome');
        
    }
}
