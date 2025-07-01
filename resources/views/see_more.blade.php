@if(session('message'))
    <p style="color:green">{{ session('message') }}</p>
@endif

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

@if($hasPaid)
    <h2>This is the premium content! 🎉</h2>
@else
    <p>You need to pay to unlock this content.</p>
    <form method="GET" action="{{ route('esewa.pay') }}">
        <button type="submit">Pay with eSewa Demo</button>
    </form>

@endif
