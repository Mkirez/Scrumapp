@extends('layouts.backlognavbar')
@section('content')

@auth

<div class="container">
  <div class="row">

    <!-- keep doing you boo -->
    <div class="col-md-4">
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="keepDoing">
        <div class="card" style="width: 18rem;">
          <div class="card-bod">
            <div class="wrapper card-body">
              <h3 class="card-title card-body">Keep Doing </h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','keepDoing') as $retrospective)
                <div class="col-md-12">

                  {{$retrospective->description}}
                </div>
                 @endforeach


              </div>
            </div>
            <input type="text" name="description" >
            <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
          </div>
        </div>
      </form> 

    </div>  

    <!-- more of -->
    <div class="col-md-4">  
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')

        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="moreOff">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">More off </h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','moreOff') as $retrospective)
                <div class="col-md-12">

                  {{$retrospective->description}}
                </div>
                 @endforeach


              </div>
            </div>
            <input type="text" name="description" >
           <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
          </div>
        </div>
      </form>
    </div>


    <div class="col-md-4">  
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')

        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="lessOff">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Less off</h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','lessOff') as $retrospective)
                <div class="col-md-12">

                  {{$retrospective->description}}
                </div>
                 @endforeach


              </div>
            </div>
             <input type="text" name="description" >
            <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
          </div>
        </div>
      </form>  
    </div>


    <div class="col-md-4"> 
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="stopDoing">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Stop Doing </h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','stopDoing') as $retrospective)
                <div class="col-md-12">
                  {{$retrospective->description}}
                </div>
                 @endforeach
              </div>
            </div>
            <input type="text" name="description" >
            <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
          </div>
        </div>
      </form>  
    </div>  
  </div>  
</div>


        @endauth
        @guest
        <h1>guest</h1>
        @endguest
        @endsection
      </div>