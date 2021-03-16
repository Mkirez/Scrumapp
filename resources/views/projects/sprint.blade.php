@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
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

                @if($backlogs)
                @foreach($backlogs as $backlog)
                <tr>

                  <!-- <th scope="row">{{ $backlog->id }}</th> -->
                  <!-- <td>{{ $backlog->project_id }}</td> -->
                  <td>{{ $backlog->backlog_item}}</td>
                  <td>{{ $backlog->description}}</td>
                  <td>{{ $backlog->moscow}}
                  </td>
                  <td>{{date('d/m/Y', strtotime($backlog->deadline)) }}
                  </td>

                  <!--  <td>{{ $backlog->task_id}}
                    </td> -->
                  <td>
                    {{getSprint($backlog->task_id,$backlog->project_id)}}
                  </td>
                </tr>
              <tbody>
                @endforeach

                @endif
                @if(Auth::user()->rights == 2)
                <div class="col-md-12" style="padding: 10px;">
                  <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#backlog">Add backlog item</a>
                </div>
                @endif
            </table>
            <!-- Modal -->
            <div id="backlog" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <form class="myForm" action="/projects" method="POST">
                    @csrf


                    <div class="col-md-12 inner-text">
                      <h1>Add backlogelement</h1>
                    </div>
                    <div class="inner-form">

                      <div class="form-group">


                        <!-- <label for="exampleInputEmail1">description</label> -->
                        <input hidden name="project_id" value="{{$backlog->project_id}}">
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
    </div>
  </div>
@endsection