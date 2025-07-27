<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Your Trek Preferences</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Set Your Trek Preferences</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('preferences.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="budget" class="form-label">Budget (in Rs)</label>
            <input type="number" name="budget" class="form-control" value="{{ old('budget', $userPreferences->budget ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="available_days" class="form-label">Available Days</label>
            <input type="number" name="available_days" class="form-control" value="{{ old('available_days', $userPreferences->available_days ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="region" class="form-label">Preferred Region</label>
            <input type="text" name="region" class="form-control" value="{{ old('region', $userPreferences->region ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="difficulty" class="form-label">Difficulty Level</label>
            <input type="text" name="difficulty" class="form-control" value="{{ old('difficulty', $userPreferences->difficulty ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Preferences</button>
    </form>
</div>
</body>
</html>
