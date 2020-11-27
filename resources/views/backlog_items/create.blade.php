@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="heading has-text-weight-bold is-size-4">New backlog_item</h1>
    <form method="POST" action="/projects/{{$project->id}}/backlog_items">
    @csrf
    <div class="field">
        <label class="label" for="name">name</label>
        <input type="text" hidden name="project_id" value="{{ $project->id }}">
        
            <div class="control">
                <input class="input @error('name') is-danger @enderror" type="text" name="name" id="" value="{{ old('name') }}">

                @error('name')
                <p class="help is-danger">{{ $errors->first('name') }}</p>
                @enderror
            </div>
        </div>

        <div class="">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>

            </div>
        </div>
    </form>
</div>
@endsection