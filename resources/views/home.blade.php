@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="wrapper" style="padding: 130px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Welcome <span>{{ Auth::user()->name }}</span></h1>

            </div>
        </div>
    </div>
</div>
@endsection
