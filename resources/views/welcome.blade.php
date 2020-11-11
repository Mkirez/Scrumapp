@extends('layouts/master')

@section('title','Team ADSD')
s
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card-columns">
            {{-- Mounia --}}
            <div class="card m-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">

                        <img src="{{ asset('images/mounia.png') }}" class="img-fluid img-thumbnail" alt="Card img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Mounia Belmamoune</h5>
                            <p class="card-text">
                                Team coordinator
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END Mounia --}}

            {{-- Stephan --}}
            <div class="card m-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="/stephan"><img src="{{ asset('images/sha.jpeg') }}" class="img-fluid img-thumbnail" alt="Card img"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Stephan Hoekseam</h5>
                            <p class="card-text">
                                Docent:
                                <ul>
                                    <li>DOMP</li>
                                    <li>Project WFFLIX</li>
                                    <li>Project AD</li>
                                    <li>Project LAB</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END Stephan --}}

            {{-- Rudy --}}
            <div class="card m-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">

                        <img src="{{ asset('images/rudy.png') }}" class="img-fluid img-thumbnail" alt="Card img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Rudy Borgstede</h5>
                            <p class="card-text">
                                Docent:
                                <ul>
                                    <li>DOMP</li>
                                    <li>Project Flevosap</li>
                                    <li>Coach</li>
                                    <li>C# I & II</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END Rudy --}}

        </div>
    </div>
</div>
@endsection