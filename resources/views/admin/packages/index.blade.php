@extends('layouts.design') {{-- Use your layout name --}}

@section('content')
<div class="p-6">
    <div class="flex justify-between mb-4 items-center">
        <h1 class="text-2xl font-bold">All Packages</h1> 
        <a href="{{ route('packages.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    + Add Package
</a>

       
    </div>

    <table class="w-full bg-white shadow-md rounded overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-3 px-4">S.N</th>
                <th class="py-3 px-4">Title</th>
                <th class="py-3 px-4">Price (Rs)</th>
                <th class="py-3 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($packages as $index => $package)
                <tr class="border-t">
                    <td class="py-3 px-4">{{ $index + 1 }}</td>
                    <td class="py-3 px-4">{{ $package->title }}</td>
                    <td class="py-3 px-4">{{ $package->price }}</td>
                    <td class="py-3 px-4">
                        <a href="#" class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <a href="#" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">No packages available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
