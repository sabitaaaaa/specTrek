<!-- @extends('layouts.itinerary') -->

@section('content')
<h1>Edit Itinerary: {{ $itinerary->title }}</h1>

@if($errors->any())
  <ul style="color:red;">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

@php
  $hiddenGems = json_decode($itinerary->hidden_gems, true) ?? [];
  $hiddenGemsText = implode("\n", array_map('strip_tags', $hiddenGems));

  $dayItinerary = json_decode($itinerary->day_to_day_itinerary, true) ?? [];
  $dayItineraryText = implode("\n", array_map('strip_tags', $dayItinerary));

  $hiddenTraditions = json_decode($itinerary->hidden_traditions, true) ?? [];
  $hiddenTraditionsText = implode("\n", array_map('strip_tags', $hiddenTraditions));
@endphp

<form action="{{ route('itinerary.update', $itinerary->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title', $itinerary->title) }}" required><br><br>

    <label>Slug:</label><br>
    <input type="text" name="slug" value="{{ old('slug', $itinerary->slug) }}" required><br><br>

    <label>Quote:</label><br>
    <textarea name="quote" class="rich-text">{{ old('quote', $itinerary->quote) }}</textarea><br><br>

    <label>Description:</label><br>
    <textarea name="description" class="rich-text">{{ old('description', $itinerary->description) }}</textarea><br><br>

    <label>Hidden Gems:</label><br>
    <textarea name="hidden_gems" class="rich-text">{{ old('hidden_gems', $hiddenGemsText) }}</textarea><br><br>

    <label>Best Time:</label><br>
    <textarea name="best_time" class="rich-text">{{ old('best_time', $itinerary->best_time) }}</textarea><br><br>

    <label>Day to Day Itinerary:</label><br>
    <textarea name="day_to_day_itinerary" class="rich-text">{{ old('day_to_day_itinerary', $dayItineraryText) }}</textarea><br><br>

    <label>Detailed Itinerary:</label><br>
    <textarea name="detailed_itinerary" class="rich-text">{{ old('detailed_itinerary', $itinerary->detailed_itinerary) }}</textarea><br><br>

    <label>Transport Table:</label><br>
    <textarea name="transport_table" class="rich-text">{{ old('transport_table', $itinerary->transport_table) }}</textarea><br><br>

    <label>Hidden Traditions:</label><br>
    <textarea name="hidden_traditions" class="rich-text">{{ old('hidden_traditions', $hiddenTraditionsText) }}</textarea><br><br>

    <label>Note:</label><br>
    <textarea name="note" class="rich-text">{{ old('note', $itinerary->note) }}</textarea><br><br>

    <label>Image 1:</label><br>
<input type="file" name="image1"><br>
@if($itinerary->image1)
    <img src="{{ asset('storage/' . $itinerary->image1) }}" alt="Image 1" style="max-width: 200px; max-height: 150px; display:block; margin-bottom:10px;">
@endif
<br>

<label>Image 2:</label><br>
<input type="file" name="image2"><br>
@if($itinerary->image2)
    <img src="{{ asset('storage/' . $itinerary->image2) }}" alt="Image 2" style="max-width: 200px; max-height: 150px; display:block; margin-bottom:10px;">
@endif
<br>

<label>Image 3:</label><br>
<input type="file" name="image3"><br>
@if($itinerary->image3)
    <img src="{{ asset('storage/' . $itinerary->image3) }}" alt="Image 3" style="max-width: 200px; max-height: 150px; display:block; margin-bottom:10px;">
@endif
<br>

<label>Image 4:</label><br>
<input type="file" name="image4"><br>
@if($itinerary->image4)
    <img src="{{ asset('storage/' . $itinerary->image4) }}" alt="Image 4" style="max-width: 200px; max-height: 150px; display:block; margin-bottom:10px;">
@endif
<br>



    <button type="submit">Update Itinerary</button>
</form>

<!-- Include your rich-text editor JS here (example CKEditor) -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  document.querySelectorAll('textarea.rich-text').forEach(textarea => {
    CKEDITOR.replace(textarea);
  });
</script>

@endsection