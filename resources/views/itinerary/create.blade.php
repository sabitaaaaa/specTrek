<!-- @extends('layouts.itinerary') -->


@section('content')
<h1>Create New Itinerary</h1>

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

    <label>Slug:</label><br>
    <input type="text" name="slug" value="{{ old('slug') }}" required><br><br>

    <label>Quote:</label><br>
    <textarea name="quote" class="rich-text">{{ old('quote') }}</textarea><br><br>

    <label>Hidden Gems:</label><br>
    <textarea name="hidden_gems" class="rich-text">{{ old('hidden_gems') }}</textarea><br><br>>

    <label>Best Time:</label><br>
    <textarea name="best_time" class="rich-text">{{ old('best_time') }}</textarea><br><br>

    <label> Day to Day Itinerary:</label><br>
    <textarea name="day_to_day_itinerary" class="rich-text">{{ old('day_to_day_itinerary') }}</textarea><br><br>

    <label>Detailed Itinerary:</label><br>
    <textarea name="detailed_itinerary" class="rich-text">{{ old('detailed_itinerary') }}</textarea><br><br>

    <label>Transport Table:</label><br>
    <textarea name="transport_table" class="rich-text">{{ old('transport_table') }}</textarea><br><br>

    <label>Hidden Traditions:</label><br>
    <textarea name="hidden_traditions" class="rich-text">{{ old('hidden_traditions') }}</textarea><br><br>

    
    <label>Note:</label><br>
    <textarea name="note" class="rich-text">{{ old('note') }}</textarea><br><br>
<label>Image 1:</label><br>
<input type="file" name="image1"><br><br>

<label>Image 2:</label><br>
<input type="file" name="image2"><br><br>

<label>Image 3:</label><br>
<input type="file" name="image3"><br><br>

<label>Image 4:</label><br>
<input type="file" name="image4"><br><br>


    

    <button type="submit">Create Itinerary</button>
</form>
@endsection