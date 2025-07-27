<?php

//app/Services/RecommendationService.php

namespace App\Services;

use App\Models\UserTrekView;
use App\Models\Trek;

class RecommendationService
{
    public static function trackUserView($userId, $trekId)
    {
        // ✅ Check if trek exists before trying to insert
        if (!Trek::where('id', $trekId)->exists()) {
            \Log::warning("Trek ID $trekId not found, skipping view tracking.");
            return;
        }

        UserTrekView::updateOrCreate(
            ['user_id' => $userId, 'trek_id' => $trekId],
            ['viewed_at' => now()]
        );
    }
    

    public static function getRecommendationsForUser($userId, $limit = 4)
    {
        $viewedTrekIds = UserTrekView::where('user_id', $userId)
            ->orderByDesc('viewed_at')
            ->limit(5)
            ->pluck('trek_id');

        if ($viewedTrekIds->isEmpty()) {
            return Trek::inRandomOrder()->limit($limit)->get();
        }

        $recommendations = Trek::whereIn('region', function ($query) use ($viewedTrekIds) {
                $query->select('region')
                      ->from('treks')
                      ->whereIn('id', $viewedTrekIds);
            })
            ->orWhereIn('difficulty', function ($query) use ($viewedTrekIds) {
                $query->select('difficulty')
                      ->from('treks')
                      ->whereIn('id', $viewedTrekIds);
            })
            ->whereNotIn('id', $viewedTrekIds)
            ->inRandomOrder()
            ->limit($limit)
            ->get();

        return $recommendations;
    }
}
