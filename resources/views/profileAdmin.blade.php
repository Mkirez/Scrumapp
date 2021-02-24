@extends('layouts.app')
@section('content')

@auth


<div class="container">
    <div class="row">
        <div class="col-md-12 border-bottom">
            <!-- <h2>Personal information</h2> -->
            <h1><strong>My profile</strong></h1>
        </div>
    </div>
</div>
<div class="container p-3 border-bottom">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-2"><strong>Profile information</strong></h4>
                </div>
                <div class="col-md-12">
                    <span>Your account information</span>
                </div>
            </div>

        </div>
        <div class="col-md-9 ">
            <div class="card" id="profile-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><strong>Name</strong></h5>
                                </div>
                                <div class="col-md-12">
                                    <h6>{{$user->name}}</h6>
                                </div>

                                <br><br>

                                <div class="col-md-12">
                                    <h5><strong>Email</strong></h5>
                                </div>
                                <div class="col-md-12">
                                    <h6>{{$user->email}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container p-3">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-2"><strong>Change user</strong></h4>
                </div>
                <div class="col-md-12">
                    <span>Your account information</span>
                </div>
            </div>
        </div>
        <div class="col-md-9 ">

            <div class="card" id="profile-card">
                <h2 class="card-header">{{$user->name}}</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
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
                                        <input class="form-control" required type="text" id="name" name="name" value="{{$user->name}}">
                                    </div>


                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        @if(!$user->product_owner())
                                            <select name="rights" class="custom-select" id="inputGroupSelect01" type="hidden">
                                                <option value="1" {{ ($user->rights == 1) ? 'selected' : '' }}>team member</option>
                                                <option value="0" {{ ($user->rights == 0) ? 'selected' : '' }}>stakeholder</option>
                                            </select>
                                    
                                        @else
                                        <select name="rights" class="custom-select" id="inputGroupSelect01" type="hidden">
                                            <option value="2" {{ ($user->rights == 2) ? 'selected' : '' }}>admin</option>
                                        </select>                                
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 ">

                                        <button id="same-color" class="btn btn-info" onclick="return confirm('are you sure you want to change this accunt?');" href="" type="submit">Change
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label>
                                        <h5>Delete account </h5>
                                    </label>

                                </div>
                                <div class="col-md-12 ">
                                    <form method="post" action="{{url('profile')}}/{{$user->id}}"> @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('are you sure you want to delete this account? ');" class="btn btn-danger" id="same-color">Delete</button>
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







<br>
<br>


<div class="container p-3  border-top">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-2"><strong>User administration</strong></h4>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table" id="profile-card">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rights</th>
                        <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>

                @foreach($users as $data)
                <tbody>
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            {{$data->rights}}
                        </td>
                        <td>
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-6">
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
    </div>

</div>





@endauth


@guest

<h1>Please sign in!</h1>

@endguest


@endsection