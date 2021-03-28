@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="tab-panel" id="pills-teamMember" role="tabpanel" aria-labelledby="pills-teamMember-tab">
                <table class="table ">
                    <thead>
                        <tr>
                            <h1>zehma sprint backlog</h1>
                            <th scope="col">Name</th>
                            <th scope="col">remove backlog item</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($in_sprint_backlog_items as $in_sprint_backlog_item)
                        <tr>
                            <th scope="row">
                                {{$in_sprint_backlog_item->name}}
                            </th>
                            <td scope=""><a href="{{url('/projects/'.$project->id. '/sprints/'.$sprint->id .'/backlog_items/' . $in_sprint_backlog_item->id . '/remove')}}">delete</a>
                            </td>


                            @endforeach

                            <div class="col-md-12" style="padding: 10px;">
                                <a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#teamember">Add bakcklog item</a>
                            </div>

                        </tr>
                    </tbody>
                </table>

                <div id="teamember" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <!-- // dit is de team users form  -->
                        <div class="modal-content">

                            <form class="myForm" action="{{ url('/projects/'. $project->id . '/sprints/' . $sprint->id . '/create')}}" method="POST">
                                @csrf
                                @method('GET')
                                <div class="col-md-12 inner-text">
                                    <h1>Add backlog item</h1>
                                </div>
                                <div class="inner-form">
                                    <div class="form-group">

                                        <select name="backlog_item" class="custom-select" id="inputGroupSelect01">

                                            @foreach($not_in_sprint_backlog_items as $not_in_sprint_backlog_item)

                                            <option value="{{ $not_in_sprint_backlog_item->id }}" selected>

                                                {{$not_in_sprint_backlog_item->name}}

                                            </option>

                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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