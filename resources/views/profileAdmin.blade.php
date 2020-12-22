@extends('layouts.app')
@section('content')

@auth


<div class="container">
        <div class="bg-block">
            <h2>Personal information</h2>
            <div class="separator"></div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="bg-block">
                            <h2>Change Profile Settings</h2>
                        <div class="separator"></div>
                            <div class="row">
                                <div class="col-12"> 
                                    <form class="form-group" action="{{url('/profile')}}/{{$user->id}}" method="post">
                                        @csrf
                                        @method('PUT')
                                     
                                        <div class="row my-2">
                                            <div class="col-12 mt-2">
                                                <label for="first_name">
                                                    <h5>Change Name </h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <br>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <select name="rights" class="custom-select" id="inputGroupSelect01">
                                                <option   >Choose...</option>


                                                
                                                <option  value="1" {{$rightStr1}} >1</option>
                                                <option value="0" {{$rightStr0}} >0</option>
                                                
                                              
                                                
                                            
                                                </select>                                               
                                            </div>
                                        </div>
                                        <br>
                                       <div class="row">
                                            <div class="col-md-12 ">
                                            
                                                <button class="btn btn-info" onclick="save_message()" href="" type="submit">change
                                                </button>
                                                    
                                                
                                            </div>
                                        </div>
                                    </form>   
                                        
                                    
                                </div>

                            </div>
                        </div>    
                    </div>
                </div>
                   
                </div>
            </div>
        </div>
    </div>

<div class="container">
        <div>
            <div class="row">
                <!-- verwijderen -->
                <div class="col-12">
                    <label for="first_name">
                        <h5>delete account </h5>
                    </label>
                </div>
                <div class="col-md-12 ">
                    <form method="post"   action="{{url('profile')}}/{{$user->id}}"> @csrf
                        @method('DELETE')
                        <button type="submit" onclick="delete_message()" class="btn btn-danger" >Delete</button>                        
                    </form>
                </div>

            </div>
        </div>
    </div>


<br>
<br>
<br>
<br>

<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">rights</th>
      <th scope="col">edit/delete</th>
    </tr>
  </thead>

@foreach($users as $data)
  <tbody>
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td>

        {{$data->rights}}</td>
      <td>
          <div class="container">
            <div class="row">

                <div class="col-md-6" >
                    <a href="/profile/{{$data->id}}/edit" type="submit" name="edit" class="btn btn-info">edit</a>
                </div>
            </div>
        </div>
      </td>
    </tr>
  </tbody>
@endforeach
</table>
</div>





@endauth


@guest

<h1>eerst inloggen jij</h1>

@endguest
    

@endsection
