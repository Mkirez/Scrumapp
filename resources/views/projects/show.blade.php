@extends('layouts.app')
@section('content')
<div class="container">
    <br>
    <br>
    <h1 class="heading has-text-weight-bold is-size-4">{{ $project->name }}</h1>
    <h3 class="">start: {{ date('d/m/Y', strtotime($project->start_date)) }}</h3>
    <h3 class="">finish: {{ date('d/m/Y', strtotime($project->end_date)) }}</h3>
    
</div>
@endsection