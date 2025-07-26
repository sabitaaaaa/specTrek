<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Trek Recommendations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Your CSS styles here */
    .badge-green {
      background-color: #28a745;
      color: white;
      font-weight: 600;
      padding: 0.3em 0.6em;
      border-radius: 0.25rem;
    }
    .badge-coral {
      background-color: #ff6f61;
      color: white;
      font-weight: 600;
      padding: 0.3em 0.6em;
      border-radius: 0.25rem;
    }
    .similar-trek-card {
      border: 2px solid #ff6f61;
      box-shadow: 0 0 10px #ff9b8a;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .similar-trek-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(255, 111, 97, 0.6);
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Trek Recommendations</h2>

    @php
      $perfectMatches = $recommendedTreks->flatten();
      $similarTreks = $otherTreks;
    @endphp

    @if($perfectMatches->isEmpty())
      <div class="alert alert-warning">
        Couldn't find a perfect match for your query. Here are some similar treks you might like.
      </div>
    @endif
    
    @if($perfectMatches->isNotEmpty())
      <h3>Perfect Matches</h3>
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach($perfectMatches as $trek)
          <div class="col">
            <div class="card h-100 shadow-sm border-success">
              <img src="{{ asset('images/' . $trek->image) }}" alt="{{ $trek->name }}" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">{{ $trek->name }}</h5>
                <p><strong>Region:</strong> {{ $trek->region }}</p>
                <p><strong>Price (Solo):</strong> Rs. {{ number_format($trek->price_solo ?? $trek->price) }}</p>
                <p><strong>Price (Couple):</strong> Rs. {{ number_format($trek->price_couple ?? $trek->price) }}</p>
                <p><strong>Price (Group):</strong> Rs. {{ number_format($trek->price_group ?? $trek->price) }}</p>
                <p><strong>Duration:</strong> {{ $trek->duration_days }} days</p>
                <p><strong>Difficulty:</strong> {{ $trek->difficulty }}</p>
                <p><strong>Best Season:</strong> {{ $trek->best_season }}</p>
                <span class="badge bg-success">Perfect Match</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    <h3><span class="badge bg-warning text-dark">Similar Treks</span></h3>

    @if($similarTreks->isEmpty())
      <div class="alert alert-secondary">No similar treks found.</div>
    @else
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($similarTreks as $trekName => $data)
          @php
            $trek = $data['trek'] ?? null;
            $prices = $data['prices'] ?? ['solo' => null, 'couple' => null, 'group' => null];
          @endphp

          @if ($trek)
            <div class="col">
              <div class="card h-100 border-warning shadow-sm">
                <img src="{{ asset('images/' . $trek->image) }}" alt="{{ $trek->name }}" class="img-fluid mb-3" style="max-height: 180px; object-fit: cover;">
                <div class="card-body">
                  <h5>{{ $trek->name }}</h5>
                  <p><strong>Region:</strong> {{ $trek->region }}</p>
                  <p><strong>Difficulty:</strong> {{ $trek->difficulty }}</p>
                  <p><strong>Best Season:</strong> {{ $trek->best_season }}</p>

                  <hr>
                  <h6>Prices:</h6>
                  <ul>
                    <li>Solo: Rs. {{ $prices['solo'] ? number_format($prices['solo']) : 'N/A' }}</li>
                    <li>Couple: Rs. {{ $prices['couple'] ? number_format($prices['couple']) : 'N/A' }}</li>
                    <li>Group: Rs. {{ $prices['group'] ? number_format($prices['group']) : 'N/A' }}</li>
                  </ul>
                  @if (!empty($data['notes']) && collect($data['notes'])->filter()->isNotEmpty())
  <div class="alert alert-info small mt-2">
    @foreach ($data['notes'] as $note)
      @if (!empty($note))
        <p class="mb-1">{{ $note }}</p>
      @endif
    @endforeach
  </div>
@endif

                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    @endif

    <div class="mt-4">
      <a href="{{ route('recommend.form') }}" class="btn btn-outline-primary">Back to Form</a>
    </div>
  </div>
</body>
</html>
