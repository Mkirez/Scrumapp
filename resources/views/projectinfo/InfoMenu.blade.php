@extends('layouts.app')
@section('content')

<div class="container">
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Backlog</a>

        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Team members</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Sprints</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Retrospectives</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <table class="table ">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Iteration</th>
                <th scope="col">Start date</th>
                <th scope="col">End Date</th>
              </tr>
            </thead>

            @foreach ($projectinfos as $projectinfo )
            <tbody>
              <tr>
                <th scope="row">{{ $projectinfo->id}}</th>
                <td>{{$projectinfo->naam}}</td>
                <td>...</td>
                <td>{{$projectinfo->start_date}}</td>
                <td>{{$projectinfo->end_date}}</td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><table class="table ">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Date of birth</th>
            </tr>
          </thead>
          @foreach ($projectinfos as $projectinfo )
          <tbody>
            <tr>
              <th scope="row">{{ $projectinfo->id}}</th>
              <td>{{$projectinfo->naam}}</td>
              <td>...</td>
              <td>{{$projectinfo->start_date}}</td>
              <td>{{$projectinfo->end_date}}</td>
            </tr>
          @endforeach
        </table></div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <table class="table ">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Iteration</th>
                <th scope="col">Start date</th>
                <th scope="col">End Date</th>
              </tr>
            </thead>
            @foreach ($projectinfos as $projectinfo )
            <tbody>
              <tr>
                <th scope="row">{{ $projectinfo->id}}</th>
                <td>{{$projectinfo->naam}}</td>
                <td>...</td>
                <td>{{$projectinfo->start_date}}</td>
                <td>{{$projectinfo->end_date}}</td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
      </div>
    </div>
  </div>  
</div>  
@endsection