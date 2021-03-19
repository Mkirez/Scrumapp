 @extends('layouts.backlognavbar')
 @section('content')

 @auth





 <form method="POST" action="{{ url('/projects/'. $project->id . '/retrospectives/' . $retrospective->id) }}">
    @csrf
    @method('PUT')

    <input value="{{$retrospective->description}}" type="text" name="description">
    <input value="{{$retrospective->status}}" type="hidden" name="status">
    <input value="{{$retrospective->project_id}}" type="hidden" name="project_id">

    <button class="btn btn-primary" name="update" type="submit">Click to update</button>


 </form>



 @endauth
 @guest
 <h1>guest</h1>
 @endguest
 @endsection