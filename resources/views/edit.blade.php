@extends('layouts.app')
@section('content')

@auth

<!-- //dit is wanneer de backlog leeg is  -->
@isset($empty)



<div class="container">
	<div class="col-md-12 text-center" style="padding: 10px;">
		<a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#backlog">Add to sprint</a>
	</div>
	<div id="backlog" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<form class="myForm" action="/insertTaskToSprint" method="POST">
					@csrf

					<input name="project_id" type="hidden">

					<!-- hier kun je beginnen je met je eerste backlpg toevoegen -->
					<div class="col-md-12 inner-text">
						<h1>Add backlogelement</h1>
					</div>
					<div class="inner-form">



						<input type="hidden" name="sprint_id" value="{{$sprint_id}}" style="display: none!important;">
						<input type="hidden" name="project_id" value="{{$project_id}}" style="display: none!important;">
						<div class="form-group">
							<select name="backlog_id" class="custom-select" id="inputGroupSelect01">
								<option selected>Choose...</option>

								@foreach($items as $item)
								<option value="{{$item->id}}">{{$item->backlog_item}}</option>
								@endforeach


							</select>
						</div>
						<input type="submit" name="submit">
				</form>

				</form>
			</div>
		</div>
	</div>

</div>
@endisset

<!-- dit is wanneer de backlog miminaal 1 backlog bevat -->
@isset($backlogs)

<div class="container">
	<table class="table ">
		<thead>
			<tr>
				{{-- <th scope="col">backlog item</th> --}}
				<!-- <th scope="col">Project id</th> -->
				<th scope="col">Name</th>
				<th scope="col">Description</th>
				<th scope="col">Moscow</th>
				<th scope="col">Deadline</th>

				<th scope="col">Assign to</th>
			</tr>
		</thead>


		<!-- hier laat je alle backlogs zien -->
		@foreach($backlogs as $backlog)
		<tbody>
			<tr>
				{{-- <th scope="row">{{$backlog->id}}</th> --}}
				<!-- 	<td>{{$backlog->project_id}}</td> -->
				<td>{{ $backlog->backlog_item}}</td>
				<td>{{$backlog->description}}</td>
				<td>{{$backlog->moscow}}</td>

				<td>{{ date('d/m/Y', strtotime($backlog->deadline)) }}</td>

				<td>
					<!-- dit is de form die users toewijst aan een backlog  -->
					<form action="/taskInsertUser" method="post">
						@csrf
						@method('post')


						<input type="hidden" name="sprint_id" value="{{$sprint_id}}" style="display: none!important;">

						<input type="hidden" name="task_id" value="{{$backlog->task_id}}" style="display: none!important;">


						<div class="form-group">
							<select required name="name" class="custom-select" id="inputGroupSelect01">
								<option value="">Choose...</option>

								@foreach($teamusers as $teamuser)
								<option value="{{$teamuser->id}}">{{$teamuser->name}}</option>
								@endforeach

							</select>
						</div>
						<input type="submit" value="send" name="submit" class="btn btn-info">
					</form>
				</td>
			</tr>
		</tbody>
		@endforeach

		<!-- button die de model-content opent waardoor je backlogs in die sprint kan gooien  -->
		<div class="col-md-12 text-center" style="padding: 10px;">
			<a style="width: 50%;" href="" class="btn btn-info" data-toggle="modal" data-target="#backlog">Add to sprint</a>
		</div>
	</table>


	<div id="backlog" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<!-- dit is de model die opent als je een task wil toewijzen aan een sprint -->
			<div class="modal-content">
				<form class="myForm" action="/insertTaskToSprint" method="POST">
					@csrf

					<!-- type="project_id" -->

					<input name="project_id" type="hidden">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div style="padding: 27px;">
									<h2>Add backlog item</h2>
								</div>
							</div>
							<div class=col-md-12>
								<div class="inner-form" style="padding: 18px 18px;">
									<!--<input type="hidden" name="backlog_id" value="{{$backlog->id}}">-->
									<input type="hidden" name="sprint_id" value="{{$sprint_id}}">
									<input type="hidden" name="project_id" value="{{$backlog->project_id}}">
									<div class="form-group">
										<select name="backlog_id" class="custom-select" id="inputGroupSelect01">
											<option selected>Choose...</option>
											@foreach($items as $item)
											<option value="{{$item->id}}">{{$item->backlog_item}}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<input type="submit" name="submit" value="send" class="btn btn-info">
									</div>
								</div>
							</div>
						</div>
					</div>


				</form>

			</div>

		</div>
	</div>
</div>
@endisset
@endauth
@guest

<h1>guest</h1>
@endguest
@endsection