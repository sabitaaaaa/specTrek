<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trek Recommendations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Recommended Treks</h2>

   @if($recommendedTreks->isEmpty())
        <div class="alert alert-warning">No treks found matching your criteria.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($treks as $trek)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $trek->name }}</h5>
                            <p class="card-text"><strong>Region:</strong> {{ $trek->region }}</p>
                            <p class="card-text"><strong>Price:</strong> Rs. {{ number_format($trek->price) }}</p>
                            <p class="card-text"><strong>Duration:</strong> {{ $trek->duration_days }} days</p>
                            <p class="card-text"><strong>Difficulty:</strong> {{ $trek->difficulty }}</p>
                            <p class="card-text"><strong>Best Season:</strong> {{ $trek->best_season }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('recommend.form') }}" class="btn btn-outline-primary">Back to Form</a>
    </div>
</div>
</body>
</html>
