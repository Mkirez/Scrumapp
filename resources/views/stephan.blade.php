@extends('layouts/master')

@section('title', 'Stephan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card-columns">
                {{-- Stephan --}}
                <div class="card m-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('images/sha.jpeg') }}" class="img-fluid img-thumbnail" alt="Card img">
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
                                <p class="card-text">
                                    Hobby's
                                <ul>
                                    <li>Tabletop games</li>
                                    <li>Kitesurfen</li>
                                    <li>Mountainbiken</li>
                                    <li>Racefietsen</li>
                                    <li>Formule 1</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END Stephan --}}
            </div>
        </div>
    </div>
@endsection
