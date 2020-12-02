@extends('layouts.app')
@section('content')
<form>

  <div class="form-group">
    <label for="exampleInputEmail1">description</label>
    <input type="email" name="description"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">backlog_item</label>
    <input type="text" name="backlog_item" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">moscow</label>
    <input type="text" name="moscow" class="form-control" id="moscow">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">deadline</label>
    <input type="date" id="" name="start_date">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
