@extends('layouts.backlognavbar')
@section('content')
<!-- die action zegt ga in de todocontroller en pak de store methode/function -->




@auth
<!-- projecten maken -->





<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Dailystand</button>
    </div>
  </div>
</div>


  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

        <form method="POST" action="{{url('/projects/' . $project->id . '/dailystands/create')}}">
          @csrf
          @method('GET')
          <div class="inner-form">
            <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
              <h1>Add Dailystand</h1>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" class="form-control" required>
              <label for="exampleInputEmail1">Date</label>
              <input type="date" name="created_date" class="form-control" required>
              <input type="integer" name="project_id" value="{{$project->id}}" class="form-control" hidden>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @foreach($dailystands as $dailystand)
  <div id="myModal-{{$dailystand->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form method="POST" action="{{url('/projects/' . $project->id . '/dailystands/' . $dailystand->id . '/update')}}">
          @csrf
          @method('GET')
          <div class="inner-form">
            <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
              <h1>Update Dailystand</h1>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" value="{{$dailystand->name}}" class="form-control" required>
              <input type="text" name="created_date" value="{{$dailystand->created_date}}" class="form-control" hidden>
              <input type="integer" name="project_id" value="{{$project->id}}" class="form-control" hidden>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  <!-- projecten -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 text-left">
        <h1>Dailystands</h1>
      </div>
    </div>
    <div class="row">
      @foreach($dailystands as $dailystand)
        <div class="col-xs-12 col-sm-12 col-md-4" style="padding: 10px;" >
          <a href="/projects/{{ $project->id }}/dailystands/{{ $dailystand->id }}/dailystand_items" style="text-decoration: none; color: black;">
            <div class="card" style="padding: 20px;">
              <div class="col-md-12 text-center dailystand-title">
                <h1 class="card-title">{{$dailystand->name}}</h1>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <p class="card-text">Date:</p>
                  </div>
                  <div class="col-md-6">
                    <span class="card-text">{{ date('d/m/Y', strtotime($dailystand->created_date)) }}</span>
                  </div>
                </div>
              </div>
               <div class="col-xs-6 col-sm-6 col-md-6 ">
              <a class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$dailystand->id}}">update</a>
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