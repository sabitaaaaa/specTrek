<h1>{{ $trek->name }}</h1>
<p>Price: ₹{{ $trek->price }}</p>
<p>Region: {{ $trek->region }}</p>
<p>Difficulty: {{ $trek->difficulty }}</p>
<p>Best Season: {{ $trek->best_season }}</p>
@if($recommendations->count())
    <h3>Because you viewed similar treks:</h3>
    <ul>
        @foreach($recommendations as $rec)
            <li>
                <a href="{{ route('treks.show', $rec->id) }}">
                    {{ $rec->name }} ({{ $rec->region }} | {{ $rec->difficulty }})
                </a>
            </li>
        @endforeach
    </ul>
@endif
