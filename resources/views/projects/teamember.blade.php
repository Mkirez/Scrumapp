@extends('layouts.backlognavbar')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="heading has-text-weight-bold is-size-4 date-title">teamembers</h1>
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="card text-center " id="backlog-card">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">name</th>
				      <th scope="col">remove user</th>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($users_in_project as $users_in_projec)
				    <tr>
				      <th scope="row">{{$users_in_projec->name}}</th>
				      <td>
				        <a href="{{url('/projects/'.$project->id. '/teamember/'.$users_in_projec->id .'/remove')}}"   @if ($loop->first) hidden @endif class="noncha">{{$users_in_projec->name}}
				        </a>
				      </td>
				    </tr>
				    @endforeach
				    <div class="col-md-12 text-right" style="padding: 10px;">
				      <a  href=""  class="btn btn-info" data-toggle="modal" data-target="#teamember">Add team users</a>
				    </div>
				  </tbody>
				</table>
			</div>
					<div id="teamember" class="modal fade" role="dialog">
						<div class="modal-dialog">

						<!-- Modal content-->
						<!-- // dit is de team users form  -->
						<div class="modal-content">
							teamember_create
							<form class="myForm" action="{{route('teamember_create', $project->id)}}" method="POST">
								@csrf
								@method('GET')
								<div class="col-md-12 inner-text">
									<h1>Add teammembers </h1>
								</div>
								<div class="inner-form">
									<div class="form-group">

										<input type="hidden" name="project_id" value="{{$project->id}}" required>
										<select name="user_id" class="custom-select" id="inputGroupSelect01">

											@foreach($not_in_project_users as $not_in_project_user)
											<option value="{{ $not_in_project_user->id }}" selected value="">

												{{$not_in_project_user->name}}

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

@endsection