@extends('layouts.itinerary')


@section('content')
<h1>Create New Itinerary</h1>

@if($errors->any())
  <ul style="color:red;">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form action="{{ route('itinerary.store') }}" method="POST">
    @csrf
    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title') }}" required><br><br>

    <label>Slug:</label><br>
    <input type="text" name="slug" value="{{ old('slug') }}" required><br><br>

    <label>Hidden Gems (comma separated):</label><br>
    <input type="text" name="hidden_gems" value="{{ old('hidden_gems') }}"><br><br>

    <label>Day to Day Itinerary (each day on new line):</label><br>
    <textarea name="day_to_day_itinerary" rows="5">{{ old('day_to_day_itinerary') }}</textarea><br><br>

    <label>Detailed Itinerary (HTML allowed):</label><br>
    <textarea name="detailed_itinerary" rows="7">{{ old('detailed_itinerary') }}</textarea><br><br>

    <label>Transport Table (HTML allowed):</label><br>
    <textarea name="transport_table" rows="5">{{ old('transport_table') }}</textarea><br><br>

    <label>Hidden Traditions (comma separated):</label><br>
    <input type="text" name="hidden_traditions" value="{{ old('hidden_traditions') }}"><br><br>

    <label>Best Time:</label><br>
    <input type="text" name="best_time" value="{{ old('best_time') }}"><br><br>

    <label>Note:</label><br>
    <textarea name="note" rows="3">{{ old('note') }}</textarea><br><br>

    <label>Image 1 filename:</label><br>
    <input type="file" name="image1" value="{{ old('image1') }}"><br><br>

    <label>Image 2 filename:</label><br>
    <input type="file" name="image2" value="{{ old('image2') }}"><br><br>

    <label>Image 3 filename:</label><br>
    <input type="file" name="image3" value="{{ old('image3') }}"><br><br>

    <label>Image 4 filename:</label><br>
    <input type="file" name="image4" value="{{ old('image4') }}"><br><br>

    <label>Quote:</label><br>
    <textarea name="quote" rows="2">{{ old('quote') }}</textarea><br><br>

    <button type="submit">Create Itinerary</button>
</form>
@endsection
