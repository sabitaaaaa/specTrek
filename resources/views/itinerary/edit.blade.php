@extends('layouts.itinerary')

@section('content')
<h1>Edit Itinerary: {{ $itinerary->title }}</h1>

{{-- Display Validation Errors --}}
@if($errors->any())
  <ul style="color:red;">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form action="{{ route('itinerary.update', $itinerary->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Basic Fields --}}
    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title', $itinerary->title) }}" required><br><br>

    <label>Slug:</label><br>
    <input type="text" name="slug" value="{{ old('slug', $itinerary->slug) }}" required><br><br>

    {{-- Image Uploads --}}
    @for ($i = 1; $i <= 4; $i++)
        <label>Image {{ $i }}:</label><br>
        <input type="file" name="image{{ $i }}"><br>
        @php $image = 'image' . $i; @endphp
        @if($itinerary->$image)
            <small>Current:</small><br>
            <img src="{{ asset('storage/' . $itinerary->$image) }}" alt="Image {{ $i }}" style="max-width: 200px; max-height: 150px; display:block; margin-bottom:10px;">
        @endif
        <br>
    @endfor

    {{-- Rich Text Fields --}}
    @php
        $fields = ['quote', 'description', 'hidden_gems', 'best_time', 'day_to_day_itinerary', 'detailed_itinerary', 'transport_table', 'hidden_traditions', 'note'];
    @endphp

    @foreach($fields as $field)
        <label>{{ ucwords(str_replace('_', ' ', $field)) }}:</label><br>
        <textarea name="{{ $field }}" class="rich-text">{{ old($field, $itinerary->$field) }}</textarea><br><br>
    @endforeach

    {{-- Homepage Highlight Checkbox --}}
    <label>
        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $itinerary->is_featured) ? 'checked' : '' }}>
        Mark as Homepage Highlight
    </label><br><br>

    <button type="submit">Update Itinerary</button>
</form>

{{-- CKEditor Setup --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  document.querySelectorAll('textarea.rich-text').forEach(textarea => {
    CKEDITOR.replace(textarea);
  });
</script>
@endsection
