 <!-- @extends('layout.design')

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4">Admin Profile</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Website Logo</label><br>
                        @if(isset($logo))
                            <img src="{{ asset('storage/' . $logo) }}" alt="Logo" height="60" class="mb-2 d-block">
                        @endif
                        <input type="file" name="logo" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Select Theme</label>
                        <select name="theme" class="form-select">
                            <option value="light" {{ $theme == 'light' ? 'selected' : '' }}>Light</option>
                            <option value="dark" {{ $theme == 'dark' ? 'selected' : '' }}>Dark</option>
                        </select>
                    </div>
                </div>

                <!-- Future profile settings can go here -->
                <!-- <hr class="my-4">

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection --> -->





