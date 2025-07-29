@extends('layouts.itinerary')

@section('title', 'Create New Itinerary')

@section('content')
<h1>Create New Itinerary</h1>

{{-- Show validation errors --}}
@if($errors->any())
  <ul style="color:red;">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form action="{{ route('itinerary.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title') }}" required><br><br>

    <label>Image 1:</label><br>
    <input type="file" name="image1"><br><br>

    <label>Image 2:</label><br>
    <input type="file" name="image2"><br><br>

    <label>Image 3:</label><br>
    <input type="file" name="image3"><br><br>

    <label>Image 4:</label><br>
    <input type="file" name="image4"><br><br>

    <label>Slug:</label><br>
    <input type="text" name="slug" value="{{ old('slug') }}" required><br><br>

    <label>Quote:</label><br>
    <textarea name="quote" class="rich-text" rows="3">{{ old('quote') }}</textarea><br><br>

    <label>Hidden Gems:</label><br>
    <textarea name="hidden_gems" class="rich-text" rows="5" placeholder="Write each item on a new line...">{{ old('hidden_gems') }}</textarea><br><br>

    <label>Best Time to Visit:</label><br>
    <textarea name="best_time" class="rich-text" rows="3">{{ old('best_time') }}</textarea><br><br>

    <label>Day to Day Itinerary:</label><br>
    <textarea name="day_to_day_itinerary" class="rich-text" rows="6" placeholder="Day 1:...\nDay 2:...">{{ old('day_to_day_itinerary') }}</textarea><br><br>

    <label>Detailed Itinerary:</label><br>
    <textarea name="detailed_itinerary" class="rich-text" rows="6">{{ old('detailed_itinerary') }}</textarea><br><br>

    <label>Transport Table:</label><br>
    <textarea name="transport_table" class="rich-text" rows="4">{{ old('transport_table') }}</textarea><br><br>

    <label>Hidden Traditions:</label><br>
    <textarea name="hidden_traditions" class="rich-text" rows="5" placeholder="Write each point on a new line...">{{ old('hidden_traditions') }}</textarea><br><br>

    <label>Note:</label><br>
    <textarea name="note" class="rich-text" rows="3">{{ old('note') }}</textarea><br><br>



    <label>
  <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
  Mark as Homepage Highlight
</label><br><br>


    <button type="submit">Create Itinerary</button>
</form>
@endsection