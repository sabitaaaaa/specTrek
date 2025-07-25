@extends('layouts.design')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Package</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('packages.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border px-4 py-2 rounded" rows="4"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Price (Rs)</label>
            <input type="number" name="price" step="0.01" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('packages.index') }}" class="text-gray-600 underline">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
</div>
@endsection
