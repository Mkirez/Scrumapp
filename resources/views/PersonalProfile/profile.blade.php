@extends('layouts.app')
@section('content')


@foreach($users as $user)
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
                                    <form class="form-group" action="{{route('todo.update', $user->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                     
                                        <div class="row my-2">
                                            <div class="col-12 mt-2">
                                                <label for="first_name">
                                                    <h5>Change Name</h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <label for="password">
                                                    <h5>Change Password</h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" type="password" name="password" value="{{$user->password}}">
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-md-12 ">
                                            
                                                <a class="btn btn-danger" href="{{route('todo.edit', $user->id)}}">
                                                </a>
                                                    
                                                
                                            </div>
                                        </div>
                                    </form>   
                                        
                                    
                                </div>

                            </div>
                        </div>    
                    </div>
                </div>
                    <div class="row my-5">
                        <div class="col-12">
                            <h3>Delete Account</h3>
                            <p>Your account will be completely deleted, all your data will be lost.</p>
                            <div class="col-md-3 text-center ">
                                <form method="post"  action="{{route('todo.destroy', $user->id)}}"> @csrf
                                    @method('DELETE')
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F44336" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>
                                    </button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@foreach($users as $user)

    <div class="container">
        <div class="bg-white" style="padding: 20px;">
            <div class="row">


                <!-- tittle -->
                <div class="col-md-2 text-center">
                    <p>{{ $user->name}}</p>
                </div>


                <!-- updaten  -->
                <div class="col-md-2 bg-dark text-center">
                        <a href="{{route('todo.edit', $user->id)}}">
                        </a>
                </div>


                <!-- verwijderen -->
                <div class="col-md-3 text-center ">
                    <form method="post"  action="{{route('todo.destroy',  $user->name)}}"> @csrf
                        @method('DELETE')
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F44336" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
    </div>
</div>

@endsection