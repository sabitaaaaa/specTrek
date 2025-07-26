@extends('layouts.app') {{-- or whatever layout you use --}}

@section('content')
    <div class="container">
        <h1>Welcome to Premium Content!</h1>
        <p>You now have access to exclusive trek details and features.</p>
        <a href="{{ route('home') }}">Go Back</a>
    </div>
@endsection
