@extends('layouts.app')
@section('content')
<!-- die action zegt ga in de todocontroller en pak de store methode/function -->







@auth



<h1>{{$projectName}}</h1>

<div class="wrapper" style="padding: 50px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Sprints - {{$sprintName}}</h1>
      </div>
    </div>
    <div class="row">




      <!-- done -->
      <div class="col-md-4">
        <div class="inner border bg-white">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Done</h1>
            </div>
            <div class="col-md-12 text-center">
              <div class="inner">
                @foreach($dataDone as $data)
                <div class="inner-inner" style="    padding: 7px;">
                  <div class="border" style="box-shadow: 0 1px 0 rgba(9,30,66,.25);">
                    {{$data->description}}
                  </div>
                </div>
                @endforeach()
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endauth

@guest



<div class="col-md-12 text-center">
  <h1>Please sign in!</h1>
</div>



@endguest









@endsection