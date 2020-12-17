@extends('layouts.app')
@section('content')
        <!-- die action zegt ga in de todocontroller en pak de store methode/function -->







@auth 


   
   
   
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="heading has-text-weight-bold is-size-4 date-title">{{ $project->name }}</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 date-title">
          <h3 class="">start: {{ date('d/m/Y', strtotime($project->start_date)) }}</h3>
        </div>
         <div class="col-md-6 text-right date-title">
          <h3 class="">finish: {{ date('d/m/Y', strtotime($project->end_date)) }}</h3>
        </div>
      </div>
    </div>



    <div class="container">
      <div class="card text-center " id="backlog-card">
        <div class="card-header">
          <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
           
           
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-sprints" role="tab" aria-controls="pills-sprints" aria-selected="false">Sprints</a>
            </li>
           <!--  <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Retrospectives</a>
            </li> -->
          </ul>


    <div class="tab-content" id="pills-tabContent">


  


      


      <div class="tab-pane fade" id="pills-sprints" role="tabpanel" aria-labelledby="pills-sprints">
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
              <td>{{$sprint->created_at}}</td>
              <td>{{$sprint->updated_at}}</td>
              <td>{{$sprint->remarks}}</td>
              <td>
                <div class="container">
                  <div class="row">

                    <div class="col-sm-12">
                      <form action="{{url('sprints', $sprint->id)}}" method="post">
                        @csrf
                        @method('GET')


                        <input type="hidden" value="{{$project->id}}" name="project_id">
                       

                        <input type="hidden" value="{{$sprint->id}}" name="sprint_id">

                        <input type="submit" value="view"  name="" class="btn btn-primary">
                        
                      </form>
                      
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
            @endforeach
         <!-- button team members -->
        </table>
    </div>
        



    
@endauth

@guest

  
    
      <div class="col-md-12 text-center">
        <h1>inloggen jij</h1>
      </div>



@endguest







   

@endsection

