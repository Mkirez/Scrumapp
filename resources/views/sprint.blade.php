@extends('layouts.app')
@section('content')
        <!-- die action zegt ga in de todocontroller en pak de store methode/function -->







@auth 



	    
	    
		<div class="wrapper" style="padding: 50px;" >
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Sprint: {{$sprintName}}</h1>
					</div>
				</div>
				<div class="row">
					
					<!-- tasks -->
					<div class="col-md-4">
						<div class="inner border bg-white">

							<div class="row">
								<div class="col-md-12 text-center">
									<h1>Backlog items</h1>
								</div>
								<div class="col-md-12 text-center">	
									<div class="inner">
										@foreach($dataSprint as $data)
										<div id="open">
											<div class="inner-inner" style="    padding: 7px;">
												<div class="border">
													<span >{{$data->name}}</span>
													<span>{{$data->description}}</span>
													<form class="form_sprint" action="{{url('sprints')}}/{{$data->task_id}}" method="post">


														@csrf
														@method('PUT')
														<input type="hidden" name="task_id" value="{{$data->task_id}}">
														<div class="row">
															<div class="col-md-12">

															<input type="radio"  name="option" value="busy">
															<label for="busy">Busy</label>
															<input type="radio"  name="option" value="done">
															<label for="done">Done</label><br>
															</div>

															<div class="col-md-12">
																<button type="submit" class="btn btn-info">Move to</button>
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
									<h1>Busy</h1>
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
									<h1>Done</h1>
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
	  
@endauth

@guest

	
		
			<div class="col-md-12 text-center">
				<h1>Please sign in!</h1>
			</div>



@endguest







   

@endsection