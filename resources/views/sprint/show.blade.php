@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="tab-panel" id="pills-teamMember" role="tabpanel" aria-labelledby="pills-teamMember-tab">
                <!-- button -->
                <div class="col-md-12" style="padding: 10px;">
                    <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#teamember">Add team users</a>
                </div>
                <!-- teamusermodel -->
                 <div id="teamember" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <!-- // dit is de team users form  -->
                        <div class="modal-content">
                           
                            <form class="myForm" action="{{ url('/projects/'. $project->id . '/sprints/' . $sprint->id . '/store')}}" method="POST">
                                @csrf
                                @method('GET')
                                <div class="col-md-12 inner-text">
                                    <h1>Add teammembers </h1>
                                </div>
                                <div class="inner-form">
                                    <div class="form-group">
                     

                                        <input type="hidden" name="project_id" value="{{$project->id}}" required>
                                        <input type="hidden" name="sprint_id" value="{{$sprint->id}}" required>
                                        <input type="hidden" name="added_to_sprint" value="1" required>
                                        <input type="hidden" name="user_id" value="{{NULL}}" required>
                                        <select name="backlog_item"  class="custom-select" id="inputGroupSelect01">

                                            @foreach($not_in_sprint_backlog_items as $not_in_sprint_backlog_item)

                                            
                                            <option value="{{ $not_in_sprint_backlog_item->id }}" selected  >

                                                {{$not_in_sprint_backlog_item->backlog_item}}

                                            </option>
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
                <div class="row">
                    <!-- todo -->
                    <div class="col-md-4 col-xs-12 col-sm-12">
                        <form method="POST" action="">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        <input type="hidden" name="status" value="keepDoing">
                            <div class="card" style="width: 100%;">
                                <div class="card">
                                <h3 class="card-title">to do</h3>
                                <div class="container">
                                    <div class="row">
                                        @foreach($in_sprint_backlog_items->where('status','todo') as $in_sprint_backlog_item)
                                        <div class="col-md-6 text-left">
                                        <a href="{{ url('projects/'.$project->id. '/sprints/' .$sprint->id. '/backlog/'.$in_sprint_backlog_item->id)}}">{{$in_sprint_backlog_item->backlog_item}}</a>
                                        </div>
                                        <div class="col-md-6 text-left">
                                           
                                        </div>
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
                        <input type="hidden" name="status" value="keepDoing">
                            <div class="card" style="width: 100%;">
                                <div class="card">
                                <h3 class="card-title">to do</h3>
                                <div class="container">
                                    <div class="row">
                                        @foreach($in_sprint_backlog_items->where('status','busy') as $in_sprint_backlog_item)
                                        <div class="col-md-12 text-left">
                                            <a href="{{ url('projects/'.$project->id. '/sprints/' .$sprint->id. '/backlog/'.$in_sprint_backlog_item->id)}}">
                                            {{$in_sprint_backlog_item->backlog_item}}</a>
                                        </div>
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
                        <input type="hidden" name="status" value="keepDoing">
                            <div class="card" style="width: 100%;">
                                <div class="card">
                                <h3 class="card-title">to do</h3>
                                <div class="container">
                                    <div class="row">
                                        @foreach($in_sprint_backlog_items->where('status','done') as $in_sprint_backlog_item)
                                        <div class="col-md-12 text-left">
                                            <a href="{{ url('projects/'.$project->id. '/sprints/' .$sprint->id. '/backlog/'.$in_sprint_backlog_item->id)}}">
                                            {{$in_sprint_backlog_item->backlog_item}}</a>
                                        </div>
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



@endsection