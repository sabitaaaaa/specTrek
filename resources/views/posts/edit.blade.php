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
        margin-bottom: 20px;
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        max-width: 600px;
        margin-top: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-top: 15px;
        color: #555;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        height: 150px;
        resize: vertical;
    }

    button {
        margin-top: 20px;
        background-color: #027478;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color:rgb(5, 74, 77);
    }

    img {
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .errors {
        background: #f8d7da;
        color: #842029;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 15px;
        border: 1px solid #f5c2c7;
    }
</style>

<h2>Edit Post</h2>

@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}">

    <label>Content:</label>
    <textarea name="content">{{ old('content', $post->content) }}</textarea>

    <label>Author:</label>
    <input type="text" name="author" value="{{ old('author', $post->author) }}">

    <label>Change Image:</label>
    <input type="file" name="image">

    @if($post->image)
        <p>Current Image:</p>
        <img src="{{ asset('uploads/' . $post->image) }}" width="150">
    @endif

    <button type="submit">Update Post</button>
</form>

@endsection
