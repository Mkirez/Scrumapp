 @extends('layouts.app')
 @section('content')

 @auth



<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('/projects/'. $project->id . '/update')	}}">
            @csrf
            @method('PUT')
            <div class="inner-form">
                <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                    <h1>edit project</h1>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{$project->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="start">Start date :</label>
                    <input type="date" value="{{$project->start_date}}" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="start">End date :</label>
                    <input type="date" name="end_date" value="{{$project->end_date}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>    
</div>

 @endauth
 @guest
 <h1>guest</h1>
 @endguest
 @endsection