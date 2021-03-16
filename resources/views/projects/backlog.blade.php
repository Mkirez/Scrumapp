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
    <div class="card-header">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-backlog" role="tabpanel" aria-labelledby="pills-backlog-tab">
          <table class="table ">
            <thead>
              <tr>
                <!-- <th scope="col">Id</th> -->
                <!-- <th scope="col">project id</th> -->
                <th scope="col">Name</th>
                <th scope="col">Description</th>

                <th scope="col">Moscow</th>
                <th scope="col">Deadline</th>
                <!-- <th scope="col">task id</th> -->
                <th scope="col">Sprint</th>


              </tr>
            </thead>




            <tbody>

              @if($backlog_items)
              @foreach($backlog_items as $backlog_item)
              <tr>

                <!-- <th scope="row">{{ $backlog_item->id }}</th> -->
                <!-- <td>{{ $backlog_item->project_id }}</td> -->
                <td>{{ $backlog_item->backlog_item}}</td>
                <td>{{ $backlog_item->description}}</td>
                <td>{{ $backlog_item->moscow}}
                </td>
                <td>{{date('d/m/Y', strtotime($backlog_item->deadline)) }}
                </td>

                <!--  <td>{{ $backlog_item->task_id}}
                  </td> -->
                <td>
                  {{getSprint($backlog_item->task_id,$backlog_item->project_id)}}
                </td>
              </tr>
            <tbody>
              @endforeach

              @endif
              
              <div class="col-md-12" style="padding: 10px;">
                <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#backlog">Add backlog item</a>
              </div>

          </table>
          <!-- Modal -->
          <div id="backlog" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <form class="myForm" action="/backlog" method="POST">
                  @csrf


                  <div class="col-md-12 inner-text">
                    <h1>Add backlogelement</h1>
                  </div>
                  <div class="inner-form">

                    <div class="form-group">


                      <!-- <label for="exampleInputEmail1">description</label> -->
                      <input hidden name="project_id" value="{{$project->id}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Name</label>
                      <input type="text" name="backlog_item" class="form-control" id="exampleInputPassword1" required>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input style="line-height: 1.3px;height: auto;" type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>



                    <div class="form-group">
                      <label for="exampleInputPassword1">Moscow</label>
                      <input type="text" name="moscow" class="form-control" id="moscow" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Deadline</label>
                      <input type="date" name="deadline" class="form-control" id="start_date" required>
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
      </div>

      <!-- user -->



      @endauth
      @guest
      <h1>guest</h1>
      @endguest
      @endsection