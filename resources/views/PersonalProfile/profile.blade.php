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
                                <?php $profiles = App\Models\Profile::all();?>
                                <?php $users = App\Models\Users::all();?>
                            @foreach ($users as $user)
                                @foreach ($profiles as $profile)
                                <a>{{ $user->name }} - {{ $profile->team_role }}</a>
                                        <br>
                                        <a> Contact: {{ $user->email }}</a>
                                        <br>
                                <div class="card-deck">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $profile->projects }}</h4>
                                            <p class="card-text">{{ $profile->team }}</p>
                                        </div>
                                    </div>
                                    @endforeach
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
