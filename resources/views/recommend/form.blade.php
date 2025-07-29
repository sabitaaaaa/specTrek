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

    <form method="POST" action="{{ route('recommend.results') }}">
        @csrf

        <div class="mb-3">
            <label for="price_min" class="form-label">Minimum Price</label>
            <input
                type="number"
                name="price_min"
                id="price_min"
                class="form-control"
                placeholder="Rs. 5000"
                min="5000"
                max="90000"
             value="{{ old('price_min', $userPreferences->price_min ?? '') }}"
                required
            />
        </div>

        <div class="mb-3">
            <label for="price_max" class="form-label">Maximum Price</label>
            <input
  type="number"
  name="price_max"
  id="price_max"
  class="form-control"
  placeholder="Rs. 5000 to 90000"
  min="5000"
  max="90000"
 value="{{ old('price_max', $userPreferences->price_max ?? '') }}"
  required
/>

            @error('price_max')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="duration_days" class="form-label">Maximum Duration (Days)</label>
            <input
                type="number"
                name="duration_days"
                id="duration_days"
                class="form-control"
                placeholder="3 to 14 days"
                min="3"
                max="14"
               value="{{ old('duration_days', $userPreferences->available_days ?? '') }}"
                required
            />
            @error('duration_days')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- 🔽 ADDED: Trekking Experience -->
        <!-- <div class="mb-3">
            <label for="experience_level" class="form-label">Your Trekking Experience</label>
            <select name="experience_level" id="experience_level" class="form-select">
                <option value="">-- Select Experience Level --</option>
                @foreach(['Beginner', 'Moderate', 'Advanced'] as $exp)
                 <option value="{{ $exp }}" {{ (old('experience_level', $userPreferences->experience_level ?? '') === $exp) ? 'selected' : '' }}> {{ $exp }}
                 </option>
                @endforeach
            </select>
            @error('experience_level')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div> -->

        <!-- 🔽 ADDED: Interest Tags -->
        <!-- <div class="mb-3">
            <label for="interest_tags" class="form-label">Your Interests</label>
            <input
                type="text"
                name="interest_tags"
                id="interest_tags"
                class="form-control"
                placeholder="e.g. lakes, mountains, culture"
               value="{{ old('interest_tags', $userPreferences->interest_tags ?? '') }}"
            />
            <small class="text-muted">Separate multiple interests using commas.</small>
            @error('interest_tags')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div> -->

        <div class="mb-3">
            <label for="best_season" class="form-label">Preferred Season</label>
            <input
                type="text"
                name="best_season"
                id="best_season"
                class="form-control"
                placeholder="e.g. Spring, Autumn"
                value="{{ old('best_season', $userPreferences->season_pref ?? '') }}"
            />
            @error('best_season')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="difficulty" class="form-label">Difficulty</label>
            <select name="difficulty" id="difficulty" class="form-select">
    <option value="">-- Select Difficulty --</option>
    @foreach(['Easy', 'Moderate', 'Hard'] as $level)
      <option value="{{ $level }}" {{ (old('difficulty', $userPreferences->difficulty ?? '') === $level) ? 'selected' : '' }}>
        {{ $level }}
      </option>
    @endforeach
            </select>
            @error('difficulty')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="region" class="form-label">Region</label>
            <select name="region" id="region" class="form-select">
                <option value="">-- Select Region --</option>
                @foreach(['Annapurna', 'Langtang', 'Kathmandu', 'Dolpa', 'Helambu', 'Manaslu'] as $region)
                    <option value="{{ $region }}" {{ (old('region', $userPreferences->region ?? '') === $region) ? 'selected' : '' }}>{{ $region }}</option>
                @endforeach
            </select>
            @error('region')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="group_size" class="form-label">Group Size</label>
            <select name="group_size" id="group_size" class="form-select">
                <option value="">-- Select Group Size --</option>
                @foreach(['Solo', 'Couple', 'Group'] as $size)
               <option value="{{ $size }}" {{ (old('group_size', $userPreferences->group_size ?? '') === $size) ? 'selected' : '' }}>{{ $size }}</option>

                @endforeach
            </select>
            @error('group_size')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="accommodation" class="form-label">Accommodation</label>
            <select name="accommodation" id="accommodation" class="form-select">
                <option value="">-- Select Accommodation --</option>
                @foreach(['Basic', 'Standard', 'Premium', 'Tea House'] as $acc)
                   <option value="{{ $acc }}" {{ (old('accommodation', $userPreferences->accommodation ?? '') === $acc) ? 'selected' : '' }}>{{ $acc }}</option>
                @endforeach
            </select>
            @error('accommodation')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between gap-2">
            <button type="submit" class="btn btn-primary w-50">Find Treks</button>
            <button type="reset" class="btn btn-secondary w-50">Clear</button>
        </div>
    </form>
</div>
</body>
</html>
