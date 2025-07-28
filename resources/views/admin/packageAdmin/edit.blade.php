@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Trek Package</h2>

    <form action="{{ route('trek-packages.update', $trek->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <!-- Pre-filled inputs -->
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $trek->title }}">
        </div>

        <!-- Same fields as create... -->
        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $trek->subtitle }}">
        </div>

        <div class="mb-3">
            <label>Quote</label>
            <textarea name="quote" class="form-control">{{ $trek->quote }}</textarea>
        </div>

        <div class="mb-3">
            <label>Hidden Gems</label>
            <input type="text" name="hidden_gems" class="form-control" value="{{ $trek->hidden_gems }}">
        </div>

        <div class="mb-3">
            <label>Best Time</label>
            <textarea name="best_time" class="form-control">{{ $trek->best_time }}</textarea>
        </div>

        <div class="mb-3">
            <label>Itinerary</label>
            <textarea name="itinerary" class="form-control">{{ $trek->itinerary }}</textarea>
        </div>

        <div class="mb-3">
            <label>Travel Options</label>
            <textarea name="travel_options" class="form-control">{{ $trek->travel_options }}</textarea>
        </div>

        <div class="mb-3">
            <label>Traditions</label>
            <textarea name="traditions" class="form-control">{{ $trek->traditions }}</textarea>
        </div>

        <!-- Image Preview & Upload -->
        <div class="mb-3">
            <label>Main Image</label><br>
            @if($trek->main_image)
                <img src="{{ asset('storage/' . $trek->main_image) }}" width="120"><br>
            @endif
            <input type="file" name="main_image" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Map Image</label><br>
            @if($trek->map_image)
                <img src="{{ asset('storage/' . $trek->map_image) }}" width="120"><br>
            @endif
            <input type="file" name="map_image" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update Trek Package</button>
    </form>
</div>
@endsection
