<!-- @extends('layouts.itinerary') -->

@section('title', 'Itinerary Editor Dashboard')

@section('content')
<h1>Itinerary Editor Dashboard</h1>

<a href="{{ route('itinerary.create') }}" class="btn btn-primary">Add New Itinerary</a>

@if(session('success'))
  <div class="alert alert-success" style="margin-top: 20px;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px;">
    <thead>
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($itineraries as $itinerary)
        <tr>
            <td>{{ $itinerary->title }}</td>
            <td>{{ $itinerary->slug }}</td>
            <td>
                <a href="{{ route('itinerary.edit', $itinerary->id) }}">Edit</a> |
                <form action="{{ route('itinerary.destroy', $itinerary->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure to delete this itinerary?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection