@extends('layouts.app')
@section('content')

@auth

<!-- productowner -->


@isset($empty)
<div class="col-md-12 text-right" style="padding: 10px;">
  <a href="" class="btn btn-info" data-toggle="modal" data-target="#backlog">Add backlog item</a>
</div>
<div id="backlog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="myForm" action="/projects" method="POST">
        @csrf



        <div class="inner-form">

          <div class="col-md-12 inner-text">
            <h1>Add backlog item</h1>
          </div>

          <div class="form-group">


            <!-- <label for="exampleInputEmail1">description</label> -->
            <input type="hidden" name="project_id" value="{{$project_id}}">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" name="backlog_item" class="form-control" id="exampleInputPassword1" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
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
            <button type="submit" class="btn btn-primary" onclick="add_teamMember()">Submit</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>
@endisset
@isset($project)
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
      <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-backlog" role="tab" aria-controls="pills-backlog" aria-selected="true">Backlog</a>

        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-teamMember" role="tab" aria-controls="pills-teamMember" aria-selected="false">Team members</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-sprints" role="tab" aria-controls="pills-sprints" aria-selected="false">Sprint</a>
        </li>
        <!--  <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Retrospectives</a>
            </li> -->
      </ul>


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
              <div class="col-md-12" style="padding: 10px;">
                <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#backlog">Add backlog item</a>
              </div>
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



        <!-- andere tab -->
        <div class="tab-pane fade" id="pills-teamMember" role="tabpanel" aria-labelledby="pills-teamMember-tab">
          <table class="table ">
            <thead>

              <tr>
                <th scope="col">Name</th>
                <th scope="col">Project</th>
              </tr>

            </thead>
            <tbody>

              @foreach($teamusers as $teamuser)
              <tr>
                <th scope="row">{{$teamuser->userName}}</th>
                <td>{{$teamuser->projectName}}</td>
              </tr>
              @endforeach
              <!-- button team members -->
              <div class="col-md-12" style="padding: 10px;">
                <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#teamember">Add team users</a>
              </div>
            </tbody>
          </table>
          <div id="teamember" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <!-- // dit is de team users form  -->
              <div class="modal-content">
                <form class="myForm" action="/teamusers" method="POST">
                  @csrf
                  <div class="col-md-12 inner-text">
                    <h1>Add teammembers </h1>
                  </div>
                  <div class="inner-form">
                    <div class="form-group">
                      <input type="hidden" name="team_id" value="{{$teamuser->team_id}}">
                      <select name="user_id" class="custom-select" id="inputGroupSelect01" required>

                        <option selected value="">Choose...</option>

                        @foreach($allUsers as $allUser)


                        {{checkTeamUser($allUser->id,$teamuser->team_id, $allUser->name)}}





                        @endforeach


                      </select>
                    </div>


                    <div class="col-md-12">
                      <button type="submit" onclick="add_teamMember()" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="pills-sprints" role="tabpanel" aria-labelledby="pills-sprints">
          <table class="table ">
            <thead>

              <tr>
                <!-- <th scope="col">Sprint id</th> -->
                <!-- <th scope="col">Project id</th> -->
                <th scope="col">Name</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
                <th scope="col">View / Delete</th>

              </tr>
            </thead>
            <tbody>
              @foreach($sprints as $sprint)
              <tr>
                <!-- <th scope="row">{{$sprint->id}}</th> -->
                <!-- <td>{{$sprint->project_id}}</td> -->
                <td>{{$sprint->remarks}}</td>
                <td>{{date('d/m/Y', strtotime($sprint->created_at)) }}</td>

                <td>{{date('d/m/Y', strtotime($sprint->updated_at)) }}</td>


                <td>
                  <div class="container">
                    <div class="row">

                      <div class="col-sm-6 text-right button-smaller">
                        <form action="{{route('sprints.edit', $sprint->id)}}" method="post">
                          @csrf
                          @method('GET')


                          <input type="hidden" value="{{$project->id}}" name="project_id">
                          <input type="hidden" name="backlog_id" value="{{$backlog->id}}">

                          <input type="hidden" value="{{$sprint->id}}" name="sprint_id">

                          <input type="submit" value="view" name="" class="btn btn-primary">

                        </form>

                      </div>

                      <div class="col-sm-6 text-left button-smaller">
                        <form action="{{url('sprints')}}/{{$sprint->id}}" method="POST">
                          @csrf
                          @method('DELETE')



                          <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this?');">

                        </form>

                      </div>

                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
            @endforeach
            <!-- button team members -->
            <div class="col-md-12" style="padding: 10px;">
              <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#halo">Add sprint</a>
            </div>
          </table>

          <div id="halo" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <form class="myForm" action="/sprints" method="POST">
                  @csrf


                  <div class="col-md-12 inner-text">
                    <h1>Add sprint</h1>
                  </div>
                  <div class="inner-form">

                    <div class="form-group">


                      <!-- <label for="exampleInputEmail1">description</label> -->
                      <input type="hidden" name="project_id" value="{{$backlog->project_id}}" required>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="remarks" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Start date</label>
                      <input type="date" name="created_at" class="form-control" id="start_date" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">End date</label>
                      <input type="date" name="updated_at" class="form-control" id="start_date" required>
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






      @endisset


      <!-- user -->



      @endauth
      @guest
      <h1>guest</h1>
      @endguest
      @endsection