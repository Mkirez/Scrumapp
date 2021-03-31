@extends('layouts.app')
@section('content')
<!-- die action zegt ga in de todocontroller en pak de store methode/function -->




@auth
<!-- projecten maken -->

    



<div class="container">
    <!-- button -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add project</button>
        </div>
    </div>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form method="POST" action="/projects/create">
                    @csrf
                     @method('GET')
                    <div class="inner-form">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                            <h1>Add project</h1>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text"  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="start">Start date :</label>
                            <input type="date" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="start">End date :</label>
                            <input type="date" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>


                        <div class="form-group">

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
                <h1>Projects</h1>
            </div>   
        </div>
        <div class="row">

            @foreach($projects as $project)
            <div class="col-xs-12 col-sm-12 col-md-4">
                <a  href="/projects/{{ $project->id }}/backlog_item" style="text-decoration: none; color: black;">
                    <div class="card" style="padding: 40px;">

                        <div class="col-md-12 text-center project-title">
                            <h1 class="card-title">{{$project->name}}</h1>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text">Start date:</p>
                                </div>
                                <div class="col-md-6">
                                    <span class="card-text">{{ date('d/m/Y', strtotime($project->start_date)) }}</span>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text">End date:</p>
                                </div>
                                <div class="col-md-6">
                                    <span class="card-text"> {{ date('d/m/Y', strtotime($project->end_date)) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 d-flex" >
                        <form method="post" action="{{ url('projects/'.$project->id. '/delete' ) }}" >
                           @csrf
                            @method('DELETE')
                            <input type="submit" name="submit" class="btn btn-danger" value="delete">
                        </form> 
                    </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 d-flex">
                         <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal_update_project-{{$project->id}}">update</a> 
                    </div>
                </div>
            </div>
            </a>
                
            </div>
            @endforeach
        </div>

    </div>
@foreach($projects as $project)
    <!-- update model -->
    <div id="modal_update_project-{{$project->id}}" class="modal fade" role="dialog">
      <div class="modal-dialog">


   
        <!-- Modal content-->
        <div class="modal-content">
          <form class="myForm" action="{{route('update_project', ['project'=>$project])}}" method="POST">
            @csrf
            @method('GET')
            <div class="col-md-12 inner-text">
              <h1>Add sprint</h1>
            </div>
            <div class="inner-form">

              <input hidden name="project_id" value="{{$project->id}}" required>

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{$project->name}}" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Start date</label>
                
                <input type="date" name="start_date" value="{{$project->start_date}}" class="form-control" required>
              </div>

              <div class="form-group">
                <label>End date</label>
                <input type="date" name="end_date" value="{{$project->end_date}}" class="form-control" required>
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
          
      </div>
    </div>
@endforeach

    


    @endauth
    @guest
    <h1>Guest</h1>
    @endguest
    @endsection