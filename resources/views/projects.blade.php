@extends('layouts.app')
@section('content')
<!-- die action zegt ga in de todocontroller en pak de store methode/function -->




 @guest
@if (Route::has('login'))

<script>window.location = "/login";</script>

@endif
@else
<div class="container">
    <div class="container">

    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-12 text-left">
            <h1>projects</h1>
        </div>
    </div>
    <div class="row">
        @foreach($projects as $project)
        <div class="col-md-4">
            <a href="/projects/{{ $project->id }}" style="text-decoration: none;">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">eind datum</p>
                            </div>
                            <div class="col-md-6">
                                <span class="card-text">{{$project->end_date}}</span>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">begin datum</p>
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


 @endguest
 

    @endsection