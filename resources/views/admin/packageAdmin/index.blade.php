@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>All Trek Packages</h2>
    <a href="{{ route('trek-packages.create') }}" class="btn btn-primary mb-3">➕ Add New Trek</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Main Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($trekPackages as $trek)
            <tr>
                <td>{{ $trek->title }}</td>
                <td>{{ $trek->subtitle }}</td>
                <td>
                    @if($trek->main_image)
                        <img src="{{ asset('storage/' . $trek->main_image) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('trek-packages.edit', $trek->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                    <form action="{{ route('trek-packages.destroy', $trek->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this trek?')">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
