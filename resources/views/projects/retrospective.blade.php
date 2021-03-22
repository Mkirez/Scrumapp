@extends('layouts.backlognavbar')
@section('content')

@auth

<div class="container">
  <div class="row">

    <!-- keep doing you boo -->
    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="keepDoing">
        <div class="card" style="width: 100%;">
          <div class="card-body">
              <h3 class="card-title">Keep Doing </h3>
            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','keepDoing') as $retrospective)
                <div class="col-md-12">
                <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/edit'  ) }}"> {{$retrospective->description}}</a> 
                <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/delete'  ) }}" class="btn btn-danger" value="">Delete: {{$retrospective->description}}</a> 
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
    <div class="col-md-4 col-xs-12 col-sm-12">  
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')

        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="moreOff">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">More off </h3>
            
            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','moreOff') as $retrospective)
                <div class="col-md-12">

                  <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/edit'  ) }}"> {{$retrospective->description}}</a>
                  <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/delete'  ) }}" class="btn btn-danger" value="">Delete: {{$retrospective->description}}</a>  
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


    <div class="col-md-4 col-xs-12 col-sm-12">  
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')

        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="lessOff">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">Less off</h3>
            

            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','lessOff') as $retrospective)
                <div class="col-md-12">

                  <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/edit'  ) }}"> {{$retrospective->description}}</a> 
                  <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/delete'  ) }}" class="btn btn-danger" value="">Delete: {{$retrospective->description}}</a> 
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


    <div class="col-md-4 col-xs-12 col-sm-12"> 
      <form method="POST" action="{{route('create_retrospectives', $project->id)}}">
        @csrf
        @method('GET')
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="status" value="stopDoing">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">Stop Doing </h3>
           
            <div class="container">
              <div class="row">
                @foreach($retrospectives->where('status','stopDoing') as $retrospective)
                <div class="col-md-12">
                  <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/edit'  ) }}"> {{$retrospective->description}}</a> 
                  <a href="{{ url('projects/'.$project->id. '/retrospectives/' .$retrospective->id. '/delete'  ) }}" class="btn btn-danger" value="">Delete: {{$retrospective->description}}</a> 
                  
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