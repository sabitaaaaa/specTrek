<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Recommended Treks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h2>Recommended Treks</h2>

    @if($treks->isEmpty())
        <div class="alert alert-warning">No treks found for your criteria.</div>
    @else
        <ul class="list-group">
            @foreach($treks as $trek)
                <li class="list-group-item">
                    <strong>{{ $trek->name }}</strong><br>
                    Price: {{ $trek->price }}<br>
                    Duration: {{ $trek->duration_days }} days<br>
                    Season: {{ $trek->best_season }}<br>
                    Difficulty: {{ $trek->difficulty }}<br>
                    Region: {{ $trek->region }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('recommendation.form') }}" class="btn btn-secondary mt-3">Back to Form</a>
</div>
</body>
</html>
