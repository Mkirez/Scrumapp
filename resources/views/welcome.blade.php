@extends('layouts.app')
@section('content')


<div class="container-fluid">
    <div class="row flex-container" style="padding: 40px;">
        <div class="col-xs-12 col-sm-12 col-md-5 vertical-middle">
            <div class="inner" style="margin-top: 100px;">

                <h1 style="    font-size: 3.3rem;">The #1 software development tool used by agile teams</h1>

                <br>
                <a type="submit" class="btn btn-info" href="{{ route('register') }}">{{ __('Register') }}</a>



            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <img style="width: 100%; height: 430px;" src="https://wac-cdn.atlassian.com/dam/jcr:b86a32cb-0aa8-4783-aa81-9592d4fbf829/jsw-header-illustrations---v3.png?cdnVersion=1342">
        </div>
    </div>
</div>
<div class="space" style="padding-top: 40px;">
</div>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1> The best software teams ship early and often. </h1>
                <span>Jira Software is built for every member of your software team to plan,
                    track, and release great software.</span>
            </div>
        </div>
    </div>
</div>


<!-- ik zeg gewoon als je al bent ingelogd redirect hem naar de home -->




@endsection