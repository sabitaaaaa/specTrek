<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create a Post</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
<link rel="stylesheet" href="{{ asset('css/create-post.css') }}">

</head> 

<body>
 @extends('layouts.app')

@section('content')
  <h2>Share your SpecTrek adventure</h2>

  <div class="form-container">
    @if ($errors->any())
      <div class="errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <label>Title:</label>
      <input type="text" name="title" value="{{ old('title') }}" required>

      <label>Content:</label>
      <textarea name="content" required>{{ old('content') }}</textarea>

      <label>Author:</label>
      <input type="text" name="author" value="{{ old('author') }}" required>

      <label>Image:</label>
      <input type="file" name="image">

      <button type="submit">Publish Post</button>
    </form>
  </div>
@endsection

</body>
</html>
