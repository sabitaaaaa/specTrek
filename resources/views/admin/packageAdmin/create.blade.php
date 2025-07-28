@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New Trek Package</h2>
    
    <form action="{{ route('trek-packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-3">
            <label for="title">Trek Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <!-- Subtitle -->
        <div class="mb-3">
            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
        </div>

        <!-- Quote -->
        <div class="mb-3">
            <label for="quote">Quote</label>
            <textarea name="quote" class="form-control" rows="2"></textarea>
        </div>

        <!-- Hidden Gems -->
        <div class="mb-3">
            <label for="hidden_gems">Hidden Gems (Comma separated)</label>
            <input type="text" name="hidden_gems" class="form-control">
        </div>

        <!-- Best Time -->
        <div class="mb-3">
            <label for="best_time">Best Time to Visit</label>
            <textarea name="best_time" class="form-control" rows="2"></textarea>
        </div>

        <!-- Itinerary (Use rich text editor) -->
        <div class="mb-3">
            <label for="itinerary">Day-by-Day Itinerary</label>
            <textarea name="itinerary" class="form-control trix-content" rows="6"></textarea>
        </div>

        <!-- Travel Options -->
        <div class="mb-3">
            <label for="travel_options">Travel Options (Table as HTML or JSON)</label>
            <textarea name="travel_options" class="form-control" rows="4"></textarea>
        </div>

        <!-- Traditions -->
        <div class="mb-3">
            <label for="traditions">Traditions & Facts (Bullets)</label>
            <textarea name="traditions" class="form-control" rows="3"></textarea>
        </div>

        <!-- Main Image -->
        <div class="mb-3">
            <label for="main_image">Main Image</label>
            <input type="file" name="main_image" class="form-control">
        </div>

        <!-- Map Image -->
        <div class="mb-3">
            <label for="map_image">Map Image</label>
            <input type="file" name="map_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Trek Package</button>
    </form>
</div>
@endsection
