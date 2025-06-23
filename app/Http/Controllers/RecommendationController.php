
<?php 
use Illuminate\Http\Request;
use App\Models\Trek;

class TrekRecommendationController extends Controller
{
    public function showForm() {
        return view('recommendation_form');
    }

  use App\Models\UserPreference;

public function processForm(Request $request)
{
    // Validate form input (optional but recommended)
    $validated = $request->validate([
        'budget' => 'required|integer',
        'available_days' => 'required|integer',
        'difficulty_pref' => 'required|string',
        'interest_tags' => 'required|string',
        'season_pref' => 'required|string',
        'expectation_notes' => 'nullable|string',
    ]);

    // Store data in the database
    UserPreference::create([
        'user_id' => auth()->check() ? auth()->id() : null, // if user is logged in
        'budget' => $request->budget,
        'available_days' => $request->available_days,
        'difficulty_pref' => $request->difficulty_pref,
        'interest_tags' => $request->interest_tags,
        'season_pref' => $request->season_pref,
        'expectation_notes' => $request->expectation_notes,
    ]);

    // Continue with recommendation logic or redirect
    // ...
}
}

