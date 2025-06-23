<!-- resources/views/recommendation_result.blade.php -->
<h2>Recommended Treks</h2>
@forelse($recommendedTreks as $trek)
    <div>
        <h3>{{ $trek->name }}</h3>
        <p>{{ $trek->description }}</p>
        <p>Cost: ${{ $trek->cost }}</p>
        <p>Duration: {{ $trek->duration_days }} days</p>
    </div>
@empty
    <p>No suitable treks found. Try adjusting your preferences.</p>
@endforelse
