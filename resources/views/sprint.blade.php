@extends('layouts.app')
@section('content')
        <!-- die action zegt ga in de todocontroller en pak de store methode/function -->




 @guest
@if (Route::has('login'))

<script>window.location = "/login";</script>

@endif
@else
<div class="wrapper" style="padding: 50px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>sprints</h1>
			</div>
		</div>
		<div class="row">

			<!-- tasks -->
			<div class="col-md-4">
				<div class="inner border bg-white">

					<div class="row">
						<div class="col-md-12 text-center">
							<h1>task</h1>
						</div>
						<div class="col-md-12 text-center">	
							<div class="inner">
								@foreach($dataSprint as $data)
								<div id="open">
									<div class="inner-inner" style="    padding: 7px;">
										<div class="border">
											<span >{{$data->name}}</span>
											<span>{{$data->description}}</span>
											<span style="font-weight: 900; ">{{$data->id}}</span>
											<form class="form_sprint" action="{{url('sprints')}}/{{$data->id}}" method="post">
												@csrf
												@method('PUT')
												<div class="row">
													<div class="col-md-12">

													<input type="radio"  name="option" value="busy">
													<label for="busy">busy</label>
													<input type="radio"  name="option" value="done">
													<label for="done">done</label><br>
													</div>

													<div class="col-md-12">
														<button type="submit" class="btn btn-info">move to</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								@endforeach()
							</div>		
							
						</div>
					</div> 
				</div>
			</div>


			<!-- busy -->
			<div class="col-md-4 ">
				<div class="inner border bg-white">

					<div class="row">
						<div class="col-md-12 text-center">
							<h1>busy</h1>
						</div>
						<div class="col-md-12 text-center">	
							<div class="inner">
								@foreach($dataBusy as $data)
									<div class="inner-inner" style="    padding: 7px;">
										<div class="border" style="box-shadow: 0 1px 0 rgba(9,30,66,.25);">
											{{$data->description}}
										</div>
									</div>
								@endforeach()
							</div>		
							
						</div>
					</div> 
				</div>
			</div>

			<!-- done -->
			<div class="col-md-4">
				<div class="inner border bg-white">

					<div class="row">
						<div class="col-md-12 text-center">
							<h1>done</h1>
						</div>
						<div class="col-md-12 text-center">	
							<div class="inner">
								@foreach($dataDone as $data)
									<div class="inner-inner" style="    padding: 7px;">
										<div class="border" style="box-shadow: 0 1px 0 rgba(9,30,66,.25);">
											{{$data->description}}
										</div>
									</div>
								@endforeach()
							</div>		
							
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>

    @endguest

@endsection