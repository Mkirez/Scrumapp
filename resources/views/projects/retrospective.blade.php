@extends('layouts.backlognavbar')
@section('content')

@auth

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <form >
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Keep Doing </h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <input type="text" name="keep_doing" >
            <div class="btn btn-primary" name="submit">Click to add</div>
          </div>
        </div>
      </form>  
    </div>  
    <div class="col-md-4">  
      <form>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">More off </h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <input type="text" name="more_off" >
            <div class="btn btn-primary" name="submit">Click to add</div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-4">  
      <form>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Less off</h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <input type="text" name="less_off" >
            <div class="btn btn-primary" name="submit">Click to add</div>
          </div>
        </div>
      </form>  
    </div>
    <div class="col-md-4"> 
      <form>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Stop Doing </h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <input type="text" name="stop_doing" >
            <div class="btn btn-primary" name="submit">Click to add</div>
          </div>
        </div>
      </form>  
    </div>  
  </div>  
</div>


        @endauth
        @guest
        <h1>guest</h1>
        @endguest
        @endsection
      </div>