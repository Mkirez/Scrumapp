@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="tab-panel" id="pills-teamMember" role="tabpanel" aria-labelledby="pills-teamMember-tab">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">remove user</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($in_sprint_backlog_items as $in_sprint_backlog_item)
                        <tr>
                            <th scope="row">
                                {{$in_sprint_backlog_item->backlog_item}}
                            </th>

                            <!-- checken the first element in my user table and give it a hidden -->
                            </td>
                            @endforeach
                            <!-- button team members -->


                            <div class="col-md-12" style="padding: 10px;">
                                <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#teamember">Add team users</a>
                            </div>


                            <!-- hier moet de button komen die in de chat staat  -->
                        </tr>
                    </tbody>
                </table>

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
            </div>
        </div>
    </div>
</div>



@endsection