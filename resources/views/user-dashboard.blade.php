@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome, {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>

    <div class="card mt-4">
        <div class="card-body">
            <h5>Your Dashboard</h5>
            <ul>
                <li><a href="#">My Profile</a></li>
                <li><a href="#">My Posts</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
    </div>
@endsection
