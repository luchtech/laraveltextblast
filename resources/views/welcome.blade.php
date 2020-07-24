@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/m7EDddq9ftQ" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="text-center text-white pt-3">
                <h1 class="font-weight-bold">Tsunami Text Blast System</h1>
                <h2>for Region XI</h2>
            </div>
            <a class="btn btn-success btn-lg btn-block mt-5 font-weight-bold" href="{{ route('subscribe') }}" role="button">Get Tsunami Alerts Today!</a>
            </div>
        </div>
    </div>
</div>
@endsection
