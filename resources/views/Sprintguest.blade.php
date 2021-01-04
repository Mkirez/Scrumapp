@extends('layouts.app')
@section('content')
        <!-- die action zegt ga in de todocontroller en pak de store methode/function -->







@auth 


   
<div class="container">
  <div class="jumbotron jumbotron-style bg-white" id="backlog-card">
    <div class="container">
      <div class="row">
        <div class="col-md-2 ">
          <h1 class="date-title"><strong>{{ $project->name }}</strong></h1>
        </div>


        <div class="col-md-4 ">
          <div class="row">
             <div class="col-md-1 " style="display: inline;">
              <i class="far fa-flag" style="line-height: 48px; color: red!important;"></i>
            </div>
            <div class="col-md-3 text-left" style="display: inline;">
               <span style="line-height: 48px; color:red!important; font-weight: 700;" class="date-title">{{ date('d/m/Y', strtotime($project->start_date)) }}<span>
            </div>
           
          </div>
         
        </div>
        <div class="col-md-4 text-left">
          
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-md-6 date-title">
          <h3 class="">start: {{ date('d/m/Y', strtotime($project->start_date)) }}</h3>
        </div>
         <div class="col-md-6 text-right date-title">
          <h3 class="">finish: {{ date('d/m/Y', strtotime($project->end_date)) }}</h3>
        </div>
      </div>
 -->    </div>
  </div>
</div>



    <div class="container">
      <div class="card text-center " id="backlog-card">
        <div class="">  
        <table class="table">
          <thead>

            <tr>
              <th scope="col">Sprint</th>
                <th scope="col">Comments</th>
              <!-- <th scope="col">project_id</th> -->
              <th scope="col">Start date</th>

            
              <th scope="col">deadline</th>
              <th scope="col">View</th>

            </tr>
          </thead>
          <tbody>
              @foreach($sprints as $sprint)
            <tr>
              <th scope="row">{{$sprint->id}}</th>
              <td>{{$sprint->remarks}}</td>
              <!-- <td>{{$sprint->project_id}}</td> -->
              <td>{{ date('d/m/Y', strtotime($sprint->created_at)) }}</td>
              
              
              <td>{{ date('d/m/Y', strtotime($sprint->end_date)) }}</td>
              <td>
                <div class="container">
                  <div class="row">

                    <div class="col-sm-12">
                      <form action="{{url('sprints', $sprint->id)}}" method="post">
                        @csrf
                        @method('GET')


                        <input type="hidden" value="{{$project->id}}" name="project_id">
                       

                        <input type="hidden" value="{{$sprint->id}}" name="sprint_id">

                        <input type="submit" value="view"  name="" class="btn btn-success" id="sprintGuest_button">
                        
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
    
        



    
@endauth

@guest

  
    
      <div class="col-md-12 text-center">
        <h1>inloggen jij</h1>
      </div>



@endguest







   

@endsection

