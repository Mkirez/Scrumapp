@extends('layouts.app')
@section('content')
<div class="container">

    @foreach($backlog_items as $backlog_item)
        <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h1>Backlog item</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">project id</p>
                            </div>
                            <div class="col-md-6">
                                <span class="card-text">{{$backlog_item->project_id}}</span>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">name</p>
                            </div>
                            <div class="col-md-6">
                                <span class="card-text">{{$backlog_item->name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach

    
</div>
@endsection