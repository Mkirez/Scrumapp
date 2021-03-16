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
                    @method('GET')
                    @csrf
                    <div class="inner-form">
                        <div class="col-md-12 inner-text">
                            <h1>Add project</h1>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
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
                <a id="project_block" href="/projects/{{ $project->id }}" style="text-decoration: none;">
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
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>

    


    @endauth
    @guest
    <h1>Guest</h1>
    @endguest
    @endsection