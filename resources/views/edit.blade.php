@extends('layouts.app')
@section('content')

  @auth
<div class="container">
	<table class="table ">
	    <thead>
	      <tr>
	        <th scope="col">Id</th>
	        <th scope="col">project id</th>
	        <th scope="col">description</th>
	        <th scope="col">backlog_item</th>
	        <th scope="col">moscow</th>
	        <th scope="col">deadline</th>
	        
	        <th scope="col">toewijzen aan</th>
	      </tr>
	    </thead>



	  @foreach($backlogs as $backlog)
	    <tbody>
			<tr>
				<th scope="row">{{$backlog->id}}</th>
				<td>{{$backlog->project_id}}</td>
				<td>{{$backlog->description}}</td>
				<td>{{ $backlog->backlog_item}}</td>
				<td>{{$backlog->moscow}}</td>

				<td>{{ $backlog->deadline}}</td>
				<td>
					
  					<form>

					  <div class="form-group">
						<select class="custom-select" id="inputGroupSelect01">
						<option selected >Choose...</option>

						@foreach($teamusers as $teamuser)
						<option value="1">{{$teamuser->name}}</option>
						@endforeach
						
						</select>	
					  </div>
					  <a type="submit" class="btn btn-primary">Submit</a>
					</form>
				</td>
				
			</tr> 
		</tbody>  
	@endforeach   
	</table>
</div>
					
    
  @endauth
  @guest

    <h1>guest</h1>
  @endguest
@endsection