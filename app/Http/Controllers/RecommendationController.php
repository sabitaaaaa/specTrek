<?php 

// namespace App\Http\Controllers; 

// use Illuminate\Http\Request;
// use App\Models\Trek;
// use App\Models\UserPreference; 
// use App\Http\Controllers\Controller;

// class TrekRecommendationController extends Controller
// {
//     public function showForm() {
//         return view('recommendation_form');
//     }

//     public function processForm(Request $request)
//     {
        
//         $validated = $request->validate([
//             'budget' => 'required|integer',
//             'available_days' => 'required|integer',
//             'difficulty_pref' => 'required|string',
//             'interest_tags' => 'required|string',
//             'season_pref' => 'required|string',
//             'expectation_notes' => 'nullable|string',
//         ]);

       
//         UserPreference::create([
//             'user_id' => auth()->check() ? auth()->id() : null,
//             'budget' => $request->budget,
//             'available_days' => $request->available_days,
//             'difficulty_pref' => $request->difficulty_pref,
//             'interest_tags' => $request->interest_tags,
//             'season_pref' => $request->season_pref,
//             'expectation_notes' => $request->expectation_notes,
//         ]);

        
//         return redirect()->back()->with('success', 'Preferences saved!');
//     }
// }
