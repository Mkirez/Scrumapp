@extends('layouts.app')
@section('content')
<!-- die action zegt ga in de todocontroller en pak de store methode/function -->




@auth

<div class="container">
    <div class="jumbotron">
        <h1>Wait untill productowner to invite you to project</h1>
    </div>
</div>
   

    


@endauth
    @guest
    <h1>Guest</h1>
    @endguest
    @endsection