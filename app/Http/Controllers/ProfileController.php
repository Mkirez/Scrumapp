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


    if(Auth::user()->rights == 0)
        {

        return view('profileUser')->with('user', $user);
        }

    if(Auth::user()->rights == 1)

    {

        return view('profileAdmin')->with('user', $user)->with('users',$users)->with('rightStr0','')->with('rightStr1','');
    }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "halo";
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
     {
    //     echo "edit";
         $user = User::find($id);
         //return $user->name;
         if ($user->rights=='1'){
            $rightStr1='selected';
            $rightStr0='';

        }else
            {
            $rightStr1='';
            $rightStr0='selected';
            }
            //return $rightStr;

         $users= User::all(); 

        // return $users;
        // return $users[0]->email;


        return view('profileAdmin')->with('user', $user)->with('users',$users)->with('rightStr0', $rightStr0)->with('rightStr1',$rightStr1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        



        $name = $request->name;
        $rights = $request->rights;

        echo $id;
        $profileUpdate= user::find($id)->update(['name'=>$name, 'rights'=>$rights]);
        
        return redirect('/profile');
    }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
        $sql = "DELETE FROM users WHERE id=$id";




        $profile = DB::update($sql);
        return view('/welcome');



        
        
    }
}
