@extends('layouts.backlognavbar')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="tab-panel" id="pills-teamMember" role="tabpanel" aria-labelledby="pills-teamMember-tab">
				<table class="table ">
					<thead>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">remove user</th>
						</tr>
					</thead>
					<tbody>

						@foreach($users_in_project as $users_in_projec)
						<tr>
						<th scope="row">
							{{$users_in_projec->name}}
						</th>
							
						<td scope="">delete:<a href="{{url('/projects/'.$project->id. '/teamember/'.$users_in_projec->id .'/remove')}}">{{$users_in_projec->name}}</a>
						</td>
						@endforeach
						<!-- button team members -->

						<div class="col-md-12" style="padding: 10px;">
							<a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#teamember">Add team users</a>
						</div>


						<!-- hier moet de button komen die in de chat staat  -->
					</tr>
					</tbody>
				</table>

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
	</div>
</div>

@endsection