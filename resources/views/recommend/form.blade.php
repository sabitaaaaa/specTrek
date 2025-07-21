<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trek Recommendation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form-trek.css') }}">
</head>
<body>
<div class="container mt-5">
    <h2>Trek Recommendation</h2>

    <form method="POST" action="{{ route('recommend.process') }}">
        @csrf

        <div class="mb-3">
            <label for="price_min" class="form-label">Minimum Price</label>
            <input type="number" name="price_min" id="price_min" class="form-control" placeholder="Enter minimum price" min="0" />
        </div>

        <div class="mb-3">
            <label for="price_max" class="form-label">Maximum Price</label>
            <input type="number" name="price_max" id="price_max" class="form-control" placeholder="Enter maximum price" max="90000" min="0" />
        </div>

        <div class="mb-3">
            <label for="duration_days" class="form-label">Maximum Duration (Days)</label>
            <input type="number" name="duration_days" id="duration_days" class="form-control" placeholder="Enter max duration" />
        </div>

        <div class="mb-3">
            <label for="best_season" class="form-label">Preferred Season</label>
            <input type="text" name="best_season" id="best_season" class="form-control" placeholder="e.g. Spring, Autumn" />
        </div>

        <div class="mb-3">
            <label for="difficulty" class="form-label">Difficulty</label>
            <select name="difficulty" id="difficulty" class="form-select">
                <option value="">-- Select Difficulty --</option>
                <option value="Easy">Easy</option>
                <option value="Moderate">Moderate</option>
                <option value="Hard">Hard</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="region" class="form-label">Region</label>
            <select name="region" id="region" class="form-select">
                <option value="">-- Select Region --</option>
                <option value="Annapurna">Annapurna</option>
                <option value="Langtang">Langtang</option>
                <option value="Kathmandu">Kathmandu</option>
                <option value="Dolpa">Dolpa</option>
                <option value="Helambu">Helambu</option>
                <option value="Manaslu">Manaslu</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="group_size" class="form-label">Group Size</label>
            <select name="group_size" id="group_size" class="form-select">
                <option value="">-- Select Group Size --</option>
                <option value="Solo">Solo</option>
                <option value="Couple">Couple</option>
                <option value="Group">Group</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="accommodation" class="form-label">Accommodation</label>
            <select name="accommodation" id="accommodation" class="form-select">
                <option value="">-- Select Accommodation --</option>
                <option value="Basic">Basic</option>
                <option value="Standard">Standard</option>
                <option value="Premium">Premium</option>
                <option value="Tea House">Tea House</option>
            </select>
        </div>

        <div class="d-flex justify-content-between gap-2">
            <button type="submit" class="btn btn-primary w-50">Find Treks</button>
            <button type="reset" class="btn btn-secondary w-50">Clear</button>
        </div>
    </form>
</div>
</body>
</html>
