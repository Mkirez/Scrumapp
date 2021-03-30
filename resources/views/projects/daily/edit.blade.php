@extends('layouts.backlognavbar')
 @section('content')

 @auth





   <form method="POST" action="{{ url('/projects/'. $project->id . '/dailystands/' . $dailystand->id) }}">
      @csrf
      @method('PUT')

      <input value="{{$dailystand->yesterday}}" type="text" name="yesterday">
      <input value="{{$dailystand->impediments}}" type="text" name="impediments">
      <input value="{{$dailystand->today}}" type="hidden" name="today">
      <input value="{{$dailystand->project_id}}" type="hidden" name="project_id">

      <button class="btn btn-primary" name="update" type="submit">Click to update</button>


   </form>


 @endauth
 @guest
 <h1>guest</h1>
 @endguest
 @endsection