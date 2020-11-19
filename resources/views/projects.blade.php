@extends('layouts.app')
@section('content')
        <!-- die action zegt ga in de todocontroller en pak de store methode/function -->

<div class="container">
    <div class="container">
     
    </div>

    <br>
    <br>


    <div class="row">
        <div class="col-md-12 text-left">
            <h1>projects</h1>
        </div>
    </div>  
    <div class="row">
        @foreach($data as $datas)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$datas->naam}}</h5>
               
                <div class="row">
                    <div class="col-md-12">
                        <span>{{$datas->reamark}}</span>
                    </div>

                    <div class="col-md-6">
                        <p class="card-text">eind datum</p>
                    </div>
                    <div class="col-md-6">
                        <span class="card-text">{{$datas->end_date}}</span>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">begin datum</p>
                    </div>
                    <div class="col-md-6">
                        <span class="card-text">{{$datas->start_date}}</span>
                    </div>
                    
                    
                </div>
              </div>
            </div>
        </div>
         @endforeach
    </div>
    
   

@endsection