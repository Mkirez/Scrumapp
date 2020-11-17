@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a class="">Hier komt alle relevante info voor de userprofile.</a>
                                <div class="card-deck">
                                    @foreach($projects as $project)
                                    <div class="card">
                                        <img class="card-img-top" src="holder.js/100x180/" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $project }}</h4>
                                            @foreach($teams as $team)
                                            <p class="card-text">{{ $team }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
