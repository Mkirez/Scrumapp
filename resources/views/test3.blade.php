<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


@auth 

@if(Auth::user()->rights == 0)
    @foreach($projects as $project)
        <div class="col-md-4">
            <a href="/projects/{{ $project->id }}" style="text-decoration: none;">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">eind datum</p>
                            </div>
                            <div class="col-md-6">
                                <span class="card-text">{{$project->end_date}}</span>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">begin datum</p>
                            </div>
                            <div class="col-md-6">
                                <span class="card-text">{{$project->start_date}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        </div>

@endif


@if(Auth::user()->rights == 1)
   
   <h1>rights is 1</h1>
@endif





@endauth

@guest

<h1>guest</h1>

@endguest

</body>
</html>