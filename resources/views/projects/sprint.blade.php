@extends('layouts.backlognavbar')
@section('content')

@auth
  <div class="tab-panel" id="pills-sprints" role="tabpanel" aria-labelledby="pills-sprints">
  <table class="table ">
  <thead>

  <tr>
  <th scope="col">sprint_id</th>
  <th scope="col">project_id</th>
  <th scope="col">start_date</th>
  <th scope="col">Standrt date</th>
  <th scope="col">remarks</th>
  <th scope="col">view/edit</th>
  </tr>
  </thead>
  <tbody>
  @foreach($sprints as $sprint)
  <tr>
  <th scope="row">{{$sprint->id}}</th>
  <td>{{$sprint->project_id}}</td>
  <td>{{date('d/m/Y', strtotime($sprint->created_at)) }}</td>
  <td>{{date('d/m/Y', strtotime($sprint->updated_at)) }}</td>
  <td>{{$sprint->remarks}}</td>
  <td>
  <div class="container">
  <div class="row">

  <div class="col-sm-6">
  <form action="{{route('sprints.edit', $sprint->id)}}" method="post">
  @csrf
  @method('GET')

  <input type="hidden" value="{{$project->id}}" name="project_id" >

  <input type="hidden" value="{{$sprint->id}}" name="sprint_id">

  <input type="submit" value="view" name="" class="btn btn-primary">
  </form>
  </div>

  <div class="col-sm-6">
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
  <div class="col-md-12 text-center" style="padding: 10px;">
      <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#halo">Add sprint</a>
  </div>
  </table>

  <!-- Modal content-->
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
                      <input type="hidden" name="project_id" value="{{$project->id}}" required>
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

 

         


  
      @endauth
      @guest
      <h1>guest</h1>
      @endguest
      @endsection