@extends('layout')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('site.uploadLogo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="site_logo" class="form-label">Choose Logo Image</label>
            <input type="file" name="site_logo" id="site_logo" class="form-control" required>
            @error('site_logo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload Logo</button>
    </form>
</div>
@endsection
