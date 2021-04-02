@extends('layouts.backlognavbar')
@section('content')

@auth

<div class="container">
  <div class="row">


    <!-- keep doing you boo -->
    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{route('create_retrospective_items', [$project->id, $sprint->id])}}">
        @csrf
        @method('GET')
        <input type="hidden" name="sprint_id" value="{{$sprint->id}}">
        <input type="hidden" name="status" value="keepDoing">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">Keep Doing </h3>
            <div class="container">
              <div class="row">
                @foreach($retrospective_items->where('status','keepDoing') as $retrospective_item)
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                     <p>{{$retrospective_item->description}}</p>
                      <a id='box' data-target="#modal_update_retrospective-{{$retrospective_item->id}}" type="button" class="btn btn-primary btn-sm" data-toggle="modal">update</a>
                      <a href="{{route('delete_retrospective_items', [$project->id, $sprint->id,$retrospective_item->id])}}" class="btn btn-danger" value="">Delete</a>
                    </div>
                  </div>
                </div>


       <div id="modal_update_retrospective-{{$retrospective_item->id}}" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form class="myForm" action="{{route('update_retrospective_item',[$project->id,$sprint->id,$retrospective_item->id])}}" method="POST">
            @csrf
            @method('GET')
            <div class="col-md-12 inner-text">
              <h1>Add retrospect</h1>
            </div>
            <div class="inner-form">

              <input hidden name="sprint_id" value="{{$sprint->id}}" required>
              <input hidden name="status" value="{{$retrospective_item->status}}" required>

              <div class="form-group">
                <label>description</label>
                <input type="text" name="description" value="{{$retrospective_item->description}}" class="form-control" required>
              </div>

             

              <div class="form-group">
                <label>End date</label>
                <input type="date" name="end_date" value="{{$sprint->end_date}}" class="form-control" required>
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
              </div>
            </div>
            <input type="text" name="description">
            <button class="btn btn-primary" name="submit" type="submit">Click to add</button>

          </div>
        </div>
      </form>
    </div>



    <!-- more of -->
    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{route('create_retrospective_items', [$project->id, $sprint->id])}}">
        @csrf
        @method('GET')

        <input type="hidden" name="sprint_id" value="{{$sprint->id}}">
        <input type="hidden" name="status" value="moreOff">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">More off </h3>

            <div class="container">
              <div class="row">
                @foreach($retrospective_items->where('status','moreOff') as $retrospective_item)
                <div class="col-md-12">

                  <a href="{{ url('projects/'.$project->id. '/retrospective_items/' .$retrospective_item->id. '/edit'  ) }}"> {{$retrospective_item->description}}</a>
                  <a href="{{route('delete_retrospective_items', [$project->id, $sprint->id,$retrospective_item->id])}}" class="btn btn-danger" value="">Delete</a>
                </div>
                @endforeach


              </div>
            </div>
            <input type="text" name="description">
            <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
          </div>
        </div>
      </form>
    </div>


    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{route('create_retrospective_items', [$project->id, $sprint->id])}}">
        @csrf
        @method('GET')

        <input type="hidden" name="sprint_id" value="{{$sprint->id}}">
        <input type="hidden" name="status" value="lessOff">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">Less off</h3>


            <div class="container">
              <div class="row">
                @foreach($retrospective_items->where('status','lessOff') as $retrospective_item)
                <div class="col-md-12">

                  <a href="{{ url('projects/'.$project->id. '/retrospective_items/' .$retrospective_item->id. '/edit'  ) }}"> {{$retrospective_item->description}}</a>
                  <a href="{{route('delete_retrospective_items', [$project->id, $sprint->id,$retrospective_item->id])}}" class="btn btn-danger" value="">Delete</a>
                </div>
                @endforeach


              </div>
            </div>
            <input type="text" name="description">
            <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
          </div>
        </div>
      </form>

    </div>


    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{route('create_retrospective_items', [$project->id, $sprint->id])}}">
        @csrf
        @method('GET')
        <input type="hidden" name="sprint_id" value="{{$sprint->id}}">
        <input type="hidden" name="status" value="stopDoing">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">Stop Doing </h3>

            <div class="container">
              <div class="row">
                @foreach($retrospective_items->where('status','stopDoing') as $retrospective_item)
                <div class="col-md-12">
                  <a href="{{ url('projects/'.$project->id. '/retrospective_items/' .$retrospective_item->id. '/edit'  ) }}"> {{$retrospective_item->description}}</a>
                  <a href="{{route('delete_retrospective_items', [$project->id, $sprint->id,$retrospective_item->id])}}" class="btn btn-danger" value="">Delete</a>

                </div>
                @endforeach
              </div>
            </div>
            <input type="text" name="description">
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