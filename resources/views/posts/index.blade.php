@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        padding: 20px;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    a.create-btn {
        display: inline-block;
        background-color: #007bff;
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        margin-bottom: 20px;
    }

    a.create-btn:hover {
        background-color: #0056b3;
    }

    .success-message {
        color: green;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .post-item {
        background: #fff;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    .post-item h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .post-item p {
        color: #555;
    }

    .post-item img {
        margin-top: 10px;
        border-radius: 4px;
        max-width: 100%;
        height: auto;
    }

    .post-actions a,
    .post-actions form button {
        display: inline-block;
        margin-right: 10px;
        text-decoration: none;
        color: #007bff;
        font-size: 14px;
        border: none;
        background: none;
        cursor: pointer;
        padding: 0;
    }

    .post-actions a:hover,
    .post-actions form button:hover {
        text-decoration: underline;
    }

    .post-actions form {
        display: inline;
    }

    .post-actions form button {
        color: red;
    }
    img {
        max-width: 100px;
        height: auto;
        border-radius: 6px;
        margin-top: 10px;
    }
</style>

<h2>All Blog Posts</h2>

<a href="{{ route('posts.create') }}" class="create-btn">+ Create New Post</a>

@if(session('success'))
    <p class="success-message">{{ session('success') }}</p>
@endif

@foreach($posts as $post)
    <div class="post-item">
        <h3>{{ $post->title }}</h3>
        <p><strong>Author:</strong> {{ $post->author }}</p>

        @if($post->image)
            <img src="{{ asset('uploads/' . $post->image) }}" alt="Post Image">
        @endif

        <p>{{ Str::limit($post->content, 100) }}</p>

        <div class="post-actions">
            <a href="{{ route('posts.show', $post->id) }}">View</a> |
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a> |
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
@endforeach

@endsection
