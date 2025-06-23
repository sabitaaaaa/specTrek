

<div class="mt-4">
    @if($treks->isEmpty())
        <p class="text-muted">No treks available in this range.</p>
    @else
        <ul class="list-group">
            @foreach($treks as $trek)
                <li class="list-group-item d-flex justify-content-between">
                    {{ $trek->name }}
                    <span class="badge bg-primary">${{ $trek->price }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
