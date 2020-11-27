@extends('layouts.app')
@section('content')
    
<div class="container">

   

    <div class="row">
        <div class="col-md-12">
           <h1>edit your todo called {{$Users->name}}<h1>
        </div>


        <div class="col-md-12">
            <form action="{​​​​​​​{​​​​​​​route('todo.update',$user->id)}​​​​​​​}​​​​​​​" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-lg" value="{{$Users->name}}" name="name">


                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12" >
                             <button class="btn btn-primary" type="submit">save</button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>   
            </div>
            </form>
        </div>
    </div>
</div>
 





@endsection