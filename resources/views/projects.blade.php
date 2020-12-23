@extends('layouts.app')
@section('content')
<!-- die action zegt ga in de todocontroller en pak de store methode/function -->




    @auth
<!-- projecten maken -->
 @if(Auth::user()->rights == 2)

<div class="container">
    <!-- button -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">add projects</button>
        </div>
    </div>
        

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="/projects/create">
                @method('GET')
                @csrf
                <div class="col-md-12 inner-text">
                    <h1>add project</h1>
                </div>
                <div class="inner-form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="form-group">
                        <label for="start">Start date :</label>
                        <input type="date" name="start_date"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="form-group">
                        <label for="start">end date :</label>
                        <input type="date" name="end_date"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- projecten -->
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <h1>projects</h1>
                </div>
            </div>
            <div class="row">
                
                @foreach($projects as $project)
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <a id="project_block" href="/projects/{{ $project->id }}" style="text-decoration: none;"  >
                        <div class="card"  style="padding: 40px;">
                            
                                <div class="col-md-12 text-center project-title" >
                                    <h1 class="card-title">{{$project->name}}</h1>
                                </div>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text">eind datum :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="card-text">{{$project->end_date}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text">begin datum :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="card-text">{{$project->start_date}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>

@endif

 @if(Auth::user()->rights == 0)

<div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <h1>projects</h1>
                </div>
            </div>
            <div class="row">
                
                @foreach($projects as $project)
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <a id="project_block" href="/projects/{{ $project->id }}" style="text-decoration: none;"  >
                        <div class="card"  style="padding: 40px;">
                            
                                <div class="col-md-12 text-center project-title" >
                                    <h1 class="card-title">{{$project->name}}</h1>
                                </div>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text">eind datum :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="card-text">{{$project->end_date}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text">begin datum :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="card-text">{{$project->start_date}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>

 @endif


 @if(Auth::user()->rights == 1)

<div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <h1>projects</h1>
                </div>
            </div>
            <div class="row">
                
                @foreach($projects as $project)
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <a id="project_block" href="/projects/{{ $project->id }}" style="text-decoration: none;"  >
                        <div class="card"  style="padding: 40px;">
                            
                                <div class="col-md-12 text-center project-title" >
                                    <h1 class="card-title">{{$project->name}}</h1>
                                </div>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text">eind datum :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="card-text">{{$project->end_date}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text">begin datum :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="card-text">{{$project->start_date}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>

 @endif


    @endauth
    @guest
        <h1>guest</h1>
    @endguest
 @endsection
