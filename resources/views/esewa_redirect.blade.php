<form action="{{ url('/esewa-success') }}" method="POST">
    @csrf
    <input type="hidden" name="amt" value="{{ $amount }}">
    <input type="hidden" name="pid" value="{{ $pid }}">
    <button type="submit">Pay with eSewa Demo (Local)</button>
</form>
