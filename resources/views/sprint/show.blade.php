@extends('layouts.backlognavbar')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="tab-panel" id="pills-teamMember" role="tabpanel" aria-labelledby="pills-teamMember-tab">
                <!-- button -->
                <div class="col-md-12" style="padding: 10px;">
                    <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#create">Add backlog item</a>
                </div>
                <!-- teamusermodel -->

                <div class="row">
                    <!-- todo -->
                    <div class="col-md-4 col-xs-12 col-sm-12">
                        <form method="POST" action="">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <div class="card" style="width: 100%;">
                                <div class="card">
                                    <h3 class="card-title">To do</h3>
                                    <div class="container">
                                        <div class="row">
                                            @foreach($in_sprint_backlog_items->where('status','todo') as $in_sprint_backlog_item)
                                            <div class="col-md-6 text-left">
                                                <p>{{$in_sprint_backlog_item->name}} bv: {{$in_sprint_backlog_item->bv}}</p>
                                                @if($in_sprint_backlog_item->user_id)
                                                <p>{{ App\Models\User::find($in_sprint_backlog_item->user_id)->name }}</p>
                                                @endif
                                            </div>
                                            <a href="{{ url('/projects/'. $project->id . '/sprints/' . $sprint->id . '/backlog/' . $in_sprint_backlog_item->id . '/remove')}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                            <a type="button" data-toggle="modal" data-target="#edit-{{ $in_sprint_backlog_item->id }}" class="btn btn-primary btn-sm">Edit</a>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- bussy -->
                    <div class="col-md-4 col-xs-12 col-sm-12">
                        <form method="POST" action="">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <div class="card" style="width: 100%;">
                                <div class="card">
                                    <h3 class="card-title">In progress</h3>
                                    <div class="container">
                                        <div class="row">
                                            @foreach($in_sprint_backlog_items->where('status','busy') as $in_sprint_backlog_item)
                                            <div class="col-md-6 text-left">
                                                <p>
                                                    {{$in_sprint_backlog_item->name}} bv: {{$in_sprint_backlog_item->bv}}</p>
                                                @if($in_sprint_backlog_item->user_id)
                                                <p>{{ App\Models\User::find($in_sprint_backlog_item->user_id)->name }}</p>
                                                @endif
                                            </div>
                                            <a href="{{ url('/projects/'. $project->id . '/sprints/' . $sprint->id . '/backlog/' . $in_sprint_backlog_item->id . '/remove')}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                            <a type="button" data-toggle="modal" data-target="#edit-{{ $in_sprint_backlog_item->id }}" class="btn btn-primary btn-sm">Edit</a>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- done -->
                    <div class="col-md-4 col-xs-12 col-sm-12">
                        <form method="POST" action="">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <div class="card" style="width: 100%;">
                                <div class="card">
                                    <h3 class="card-title">Done</h3>
                                    <div class="container">
                                        <div class="row">

                                            @foreach($in_sprint_backlog_items->where('status','done') as $in_sprint_backlog_item)
                                            <div class="col-md-6 text-left">
                                                <p>
                                                    {{$in_sprint_backlog_item->name}} bv: {{$in_sprint_backlog_item->bv}}</p>
                                                @if($in_sprint_backlog_item->user_id)
                                                <p>{{ App\Models\User::find($in_sprint_backlog_item->user_id)->name }}</p>
                                                @endif
                                            </div>
                                            <a href="{{ url('/projects/'. $project->id . '/sprints/' . $sprint->id . '/backlog/' . $in_sprint_backlog_item->id . '/remove')}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                            <a type="button" data-toggle="modal" data-target="#edit-{{ $in_sprint_backlog_item->id }}" class="btn btn-primary btn-sm">Edit</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <!-- // dit is de team users form  -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add backlog item </h1>
            </div>
            <form class="myForm" action="{{ url('/projects/'. $project->id . '/sprints/' . $sprint->id . '/create')}}" method="POST">
                @csrf
                @method('GET')

                <div class="modal-body">
                    <div class="form-group">
                        <label for="select_item">Backlog item:</label>
                        <select name="backlog_item" class="custom-select" required id="inputGroupSelect01">
                            <option value="">Choose</option>
                            @foreach($not_in_sprint_backlog_items as $not_in_sprint_backlog_item)
                            <option value="{{ $not_in_sprint_backlog_item->id }}">
                                {{$not_in_sprint_backlog_item->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="assign_user">User (optional)</label>
                        <select name="user_id" class="custom-select" id="inputGroupSelect01">
                            <option value="">Choose</option>
                            @foreach($in_project_users as $in_project_user)
                            <option value="{{ $in_project_user->id }}">
                                {{$in_project_user->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Business Value (optional)</label>
                        <input class="form-control" name="bv" type="number" step="5" max="100" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="add_teamMember()" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach($in_sprint_backlog_items as $in_sprint_backlog_item)
<div id="edit-{{ $in_sprint_backlog_item->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <!-- // dit is de team users form  -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit sprint backlog item </h1>
            </div>
            <form class="myForm" action="/projects/{{ $project->id}}/sprints/{{$sprint->id}}/backlog/{{$in_sprint_backlog_item->id}}/update" method="POST">
                @csrf
                @method('GET')

                <div class="modal-body">
                    <div class="form-group">
                        <label for="assign_user">User (optional)</label>
                        <select name="user_id" class="custom-select" id="inputGroupSelect01">
                            <option value="">Choose</option>
                            @foreach($in_project_users as $in_project_user)
                            <option value="{{ $in_project_user->id }}" {{ ($in_sprint_backlog_item->user_id == $in_project_user->id) ? 'selected' : '' }}>
                                {{$in_project_user->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="assign_user">Status (optional)</label>
                        <select name="status" class="custom-select" id="inputGroupSelect01">
                            <option value="todo" {{ ($in_sprint_backlog_item->status == "todo") ? 'selected' : '' }}>
                                Todo
                            </option>
                            <option value="busy" {{ ($in_sprint_backlog_item->status == "busy") ? 'selected' : '' }}>
                                In progress
                            </option>
                            <option value="done" {{ ($in_sprint_backlog_item->status == "done") ? 'selected' : '' }}>
                                Done
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Business Value (optional)</label>
                        <input value="{{$in_sprint_backlog_item->bv}}" class="form-control" name="bv" type="number" step="5" max="100" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="add_teamMember()" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection