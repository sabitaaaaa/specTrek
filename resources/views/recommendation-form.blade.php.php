<!-- resources/views/recommendation_form.blade.php -->
<form action="{{ route('recommendation.process') }}" method="POST">
    @csrf
    <input type="number" name="budget" placeholder="Your Budget (USD)">
    <input type="number" name="available_days" placeholder="Available Days">
    
    <select name="difficulty_pref">
        <option value="Easy">Easy</option>
        <option value="Medium">Medium</option>
        <option value="Hard">Hard</option>
    </select>

    <input type="text" name="interest_tags" placeholder="Your Interests (comma-separated)">
    
    <select name="season_pref">
        <option value="Spring">Spring</option>
        <option value="Autumn">Autumn</option>
        <!-- etc -->
    </select>

    <textarea name="expectation_notes" placeholder="What do you expect from the trek?"></textarea>

    <button type="submit">Find My Trek</button>
</form>
