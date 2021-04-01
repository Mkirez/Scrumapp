@extends('layouts.backlognavbar')
@section('content')

@auth

<div class="container">
  <div class="row">

    <!-- What did you do yesterday? -->
    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{url('/projects/' . $project->id . '/dailystands/' .$dailystand->id . '/dailystand_items/create')}}">
        @csrf
        @method('GET')
        <input type="hidden" name="dailystand_id" value="{{$dailystand->id}}">
        <input type="text" name="description">
        <input type="hidden" name="status" value="0">
        <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
      </form>
      <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">What did you do yesterday?</h3>
            <div class="container">
              <div class="row">
                @foreach($dailystand_items->where('status', 0) as $dailystand_item)
                <div class="col-md-12">
                  <p>{{$dailystand_item->description}}</p>  
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <a class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$dailystand_item->id}}">Update</a>
                  </div>
                  <div div class="col-md-6">
                    <a href="{{route('delete_dailystanditems',[$project->id, $dailystand->id ,$dailystand_item->id])}}" class="btn btn-info">Delete</a>
                  </div>
                </div>
                <div id="myModal-{{$dailystand_item->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <form method="POST" action="{{route('update_dailystanditems', [$project->id, $dailystand->id, $dailystand_item->id])}}">
                      @csrf
                      @method('GET')
                      <div class="inner-form">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                          <h1>Add Dailystand</h1>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <input type="hidden" name="dailystand_id" value="{{$dailystand->id}}">
                          <input type="hidden" name="status" value="0">
                          <input type="text" name="description" value="{{$dailystand_item->description}}" class="form-control" required>
                        </div>

                        <class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          </class=>

                       </div>
                    </form>
                  </div>
                </div>
              </div> 


                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- What will you do today? -->
    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{url('/projects/' . $project->id . '/dailystands/' .$dailystand->id . '/dailystand_items/create')}}">
        @csrf
        @method('GET')
        <input type="hidden" name="dailystand_id" value="{{$dailystand->id}}">
        <input type="text" name="description">
        <input type="hidden" name="status" value="1">
        <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
      </form>
      <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">What will you do today?</h3>
            <div class="container">
              <div class="row">
                @foreach($dailystand_items->where('status', 1) as $dailystand_item)
                <div class="col-md-12">
                <p>{{$dailystand_item->description}}</p>  
                </div>
                <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$dailystand_item->id}}">Update</a>
                </div>
                  <div div class="col-md-6">
                    <a href="{{route('delete_dailystanditems',[$project->id, $dailystand->id ,$dailystand_item->id])}}" class="btn btn-info">Delete</a>
                  </div>
                </div>
                <div id="myModal-{{$dailystand_item->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <form method="POST" action="{{route('update_dailystanditems', [$project->id, $dailystand->id, $dailystand_item->id])}}">
                      @csrf
                      @method('GET')
                      <div class="inner-form">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                          <h1>Add Dailystand</h1>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <input type="hidden" name="dailystand_id" value="{{$dailystand->id}}">
                          <input type="hidden" name="status" value="1">
                          <input type="text" name="description" value="{{$dailystand_item->description}}" class="form-control" required>
                        </div>

                        <class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          </class=>

                       </div>
                    </form>
                  </div>
                </div>
              </div> 
                
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Are there any impediments in your way? -->
    <div class="col-md-4 col-xs-12 col-sm-12">
      <form method="POST" action="{{url('/projects/' . $project->id . '/dailystands/' .$dailystand->id . '/dailystand_items/create')}}">
        @csrf
        @method('GET')
        <input type="hidden" name="dailystand_id" value="{{$dailystand->id}}">
        <input type="text" name="description">
        <input type="hidden" name="status" value="2">
        <button class="btn btn-primary" name="submit" type="submit">Click to add</button>
      </form>
      <div class="card" style="width: 100%;">
          <div class="card-body">
            <h3 class="card-title">Are there any impediments in your way?</h3>
            <div class="container">
              <div class="row">
                @foreach($dailystand_items->where('status', 2) as $dailystand_item)
                <div class="col-md-12">
                  <p>{{$dailystand_item->description}}</p>  
                </div>
                <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$dailystand_item->id}}">Update</a>
                  </div>
                  <div div class="col-md-6">
                    <a href="{{route('delete_dailystanditems',[$project->id, $dailystand->id ,$dailystand_item->id])}}" class="btn btn-info">Delete</a>
                  </div>
                </div>
                <div id="myModal-{{$dailystand_item->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <form method="POST" action="{{route('update_dailystanditems', [$project->id, $dailystand->id, $dailystand_item->id])}}">
                      @csrf
                      @method('GET')
                      <div class="inner-form">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                          <h1>Add Dailystand</h1>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <input type="hidden" name="dailystand_id" value="{{$dailystand->id}}">
                          <input type="hidden" name="status" value="2">
                          <input type="text" name="description" value="{{$dailystand_item->description}}" class="form-control" required>
                        </div>

                        <class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          </class=>

                       </div>
                    </form>
                  </div>
                </div>
              </div> 
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>


@endauth
@guest
<h1>guest</h1>
@endguest
@endsection
</div>