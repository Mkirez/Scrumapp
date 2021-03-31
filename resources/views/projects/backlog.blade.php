@extends('layouts.backlognavbar')
@section('content')

@auth
<!-- productowner -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="heading has-text-weight-bold is-size-4 date-title">{{ $project->name }}</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 date-title">
      <h3 class="">Start: {{ date('d/m/Y', strtotime($project->start_date)) }}</h3>
    </div>
    <div class="col-md-6 text-right date-title">
      <h3 class="">Finish: {{ date('d/m/Y', strtotime($project->end_date)) }}</h3>
    </div>
  </div>
</div>

<div class="container">





  <div class="card text-center " id="backlog-card">




    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">edit/delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">name</th>
      <td>Description</td>
      <td>edit/delete</td>
    </tr>
    @if($backlog_items)
     @foreach($backlog_items->where('added_to_sprint', 0); as $backlog_item)
    <tr>
      <th scope="row">{{ $backlog_item->name}}</th>
      <td>{{ $backlog_item->description}}</td>
      <td>
          <a href="" class="btn btn-primary">edit</a>
          <a href="" class="btn btn-primary">delete</a>
      </td>
    </tr>
     @endforeach
      @endif
      <div class="col-md-12 text-right" style="padding: 10px;">
            <a href="" class="btn btn-info" data-toggle="modal" data-target="#backlog">Add backlog item</a>
          </div>
  </tbody>
</table>
    <!-- Modal -->
    <div id="backlog" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form method="POST" action="/backlog">
            @csrf

            <div class="col-md-12 inner-text">
              <h1>Add backlogelement</h1>
            </div>
            <div class="inner-form">

              <input hidden name="project_id" value="{{$project->id}}">

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Description</label>
                <input style="line-height: 1.3px;height: auto;" type="text" name="description" class="form-control" required>
              </div>


              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- user -->



  @endauth
  @guest
  <h1>guest</h1>
  @endguest
  @endsection