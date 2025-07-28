<?php

// app/Services/RecommendationService.php

namespace App\Services;

use App\Models\UserTrekView;
use App\Models\Itinerary;

class RecommendationService
{
    public static function trackUserView($userId, $itineraryId)
    {
        // ✅ Check if itinerary exists before trying to insert
        if (!Itinerary::where('id', $itineraryId)->exists()) {
            \Log::warning("Itinerary ID $itineraryId not found, skipping view tracking.");
            return;
        }

        UserTrekView::updateOrCreate(
            ['user_id' => $userId, 'itinerary_id' => $itineraryId],
            ['viewed_at' => now()]
        );
    }

    public static function getRecommendationsForUser($userId, $limit = 4)
    {
        $viewedIds = UserTrekView::where('user_id', $userId)
            ->orderByDesc('viewed_at')
            ->limit(5)
            ->pluck('itinerary_id');

        if ($viewedIds->isEmpty()) {
            return Itinerary::inRandomOrder()->limit($limit)->get();
        }

        $recommendations = Itinerary::whereIn('region', function ($query) use ($viewedIds) {
                $query->select('region')
                      ->from('itineraries')
                      ->whereIn('id', $viewedIds);
            })
            ->orWhereIn('difficulty', function ($query) use ($viewedIds) {
                $query->select('difficulty')
                      ->from('itineraries')
                      ->whereIn('id', $viewedIds);
            })
            ->whereNotIn('id', $viewedIds)
            ->inRandomOrder()
            ->limit($limit)
            ->get();

        return $recommendations;
    }

    public static function getPreferenceRecommendationsForUser($userId, $limit = 4)
    {
        $preferences = \App\Models\UserPreference::where('user_id', $userId)->first();

        if (!$preferences) {
            return Itinerary::inRandomOrder()->limit($limit)->get();
        }

        $query = Itinerary::query();

        if ($preferences->budget) {
            $query->where('price', '<=', $preferences->budget);
        }

        if ($preferences->available_days) {
            $query->where('duration_days', '<=', $preferences->available_days);
        }

        if ($preferences->difficulty) {
            $query->where('difficulty', $preferences->difficulty);
        }

        return $query->inRandomOrder()->limit($limit)->get();
    }
}
