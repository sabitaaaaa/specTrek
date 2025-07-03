@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        line-height: 1.6;
         padding: 0; 
    }

    h2 {
        color: #333;
        margin-bottom: 15px;
    }

    p {
        color: #555;
        line-height: 1.6;
    }

    img {
        max-width: 10px;
        height: auto;
        border-radius: 6px;
        margin: 15px 0;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
       
      
    }

    a.back-link {
        display: inline-block;
        margin-top: 20px;
        background-color: #027478;
        color: white;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
    }

    a.back-link:hover {
        background-color:rgb(5, 74, 77);
    }
</style>

<h2>{{ $post->title }}</h2>

<p><strong>Author:</strong> {{ $post->author }}</p>

@if($post->image)
    <img src="{{ asset('uploads/' . $post->image) }}" alt="Post Image">
@endif

<p>{{ $post->content }}</p>

<a href="{{ route('posts.index') }}" class="back-link">← Back to All Posts</a>

@endsection
