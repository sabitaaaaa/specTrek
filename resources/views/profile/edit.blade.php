<<<<<<< HEAD
=======
<<<<<<< HEAD
@extends('layout')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('site.uploadLogo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="site_logo" class="form-label">Choose Logo Image</label>
            <input type="file" name="site_logo" id="site_logo" class="form-control" required>
            @error('site_logo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload Logo</button>
    </form>
</div>
@endsection
=======
>>>>>>> origin/merged-ayushma
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<<<<<<< HEAD
@extends('layout')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('site.uploadLogo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="site_logo" class="form-label">Choose Logo Image</label>
            <input type="file" name="site_logo" id="site_logo" class="form-control" required>
            @error('site_logo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload Logo</button>
    </form>
</div>
@endsection
=======
>>>>>>> origin/merged-anushree
>>>>>>> origin/merged-ayushma
