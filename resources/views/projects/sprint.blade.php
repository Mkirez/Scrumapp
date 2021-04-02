@extends('layouts.backlognavbar')
@section('content')

@auth

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="heading has-text-weight-bold is-size-4 date-title">sprints</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="card text-center " id="backlog-card">
    <table class="table ">
      <thead>

        <tr>
          <th scope="col">Name</th>
          <th scope="col">Start date</th>
          <th scope="col">End date</th>
          <th scope="col">View/Edit</th>
          <th scope="col">Retrospective</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sprints as $sprint)
        <tr>
          <td>{{$sprint->name}}</td>
          <td>{{date('d/m/Y', strtotime($sprint->start_date)) }}</td>
          <td>{{date('d/m/Y', strtotime($sprint->end_date)) }}</td>
          <td>
            <a href="{{ url('/projects/'. $project->id . '/sprints/' . $sprint->id)}}" type="button" class="btn btn-primary btn-sm">Go</a>
            <a id='box' href="" data-target="#modal_update_sprint-{{$sprint->id}}" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Edit</a>
          </td>
          <td>
            <a href="{{route('index_retrospective',[$project, $sprint])}}" type="button" class="btn btn-primary btn-sm">Go</a>
          </td>
        </tr>
      </tbody>
      @endforeach
      <!-- button team members -->
      <div class="col-md-12 text-center" style="padding: 10px;">
        <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#modal_add_sprint">Add sprint</a>
      </div>
    </table>

    <!-- Modal content-->
    <div id="modal_add_sprint" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <form class="myForm" action="{{route('create_sprints', $project->id)}}" method="POST">
            @csrf
            @method('GET')
            <div class="col-md-12 inner-text">
              <h1>Add sprint</h1>
            </div>
            <div class="inner-form">

              <input hidden name="project_id" value="{{$project->id}}" required>

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Start date</label>
                <input type="date" name="start_date" class="form-control" required>
              </div>

              <div class="form-group">
                <label>End date</label>
                <input type="date" name="end_date" class="form-control" required>
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

      @foreach($sprints as $sprint)
    <!-- update model -->
    <div id="modal_update_sprint-{{$sprint->id}}" class="modal fade" role="dialog">
      <div class="modal-dialog">


   
        <!-- Modal content-->
        <div class="modal-content">
          <form class="myForm" action="{{route('update_sprint',['project'=>$project,'sprint'=>$sprint])}}" method="POST">
            @csrf
            @method('GET')
            <div class="col-md-12 inner-text">
              <h1>Add sprint</h1>
            </div>
            <div class="inner-form">

              <input hidden name="project_id" value="{{$project->id}}" required>

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{$sprint->name}}" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Start date</label>
                
                <input type="date" name="start_date" value="{{$sprint->start_date}}" class="form-control" required>
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
@endauth

@endsection