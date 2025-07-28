<h1>{{ $trek->title }}</h1>
<p>{{ $trek->subtitle }}</p>
<img src="{{ asset('storage/' . $trek->main_image) }}" />
<div>{!! $trek->itinerary !!}</div>