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


        
   
         $user = User::find($id);
         //return $user->name;
        //  if (Auth::user()->team_member())
        //  {
        //     $rightStr1='team_member';
        //     $rightStr0='';
        //     $rightStr2='';

        // }
        // elseif(Auth::user()->product_owner())
        // {
        //     $rightStr1='';
        //     $rightStr0='';
        //     $rightStr2='product owner';
        // }else{
        //     $rightStr1='';
        //     $rightStr0='stakeholder';
        //     $rightStr2='';

        // }
            //return $rightStr;

         $users= User::all(); 

        // return $users;
        // return $users[0]->email;


        return view('profileAdmin')->with('user', $user)->with('users',$users)->with('rightStr0', $rightStr0)->with('rightStr1',$rightStr1)->with('rightStr2',$rightStr2);
    }

  
    public function update(Request $request, $id)
    {

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
