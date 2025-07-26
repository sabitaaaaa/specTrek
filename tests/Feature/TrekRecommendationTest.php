<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Trek;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrekRecommendationTest extends TestCase
{
    use RefreshDatabase; // This will handle migrations for you

    protected function setUp(): void
    {
        parent::setUp();
        // Seed the database with trek data
        Trek::factory()->create([
            'name' => 'Manaslu Circuit',
            'price' => 90000,
            'duration_days' => 14,
            'best_season' => 'Autumn',
            'difficulty' => 'Hard',
            'region' => 'Manaslu',
            'group_size' => 'Solo',
            'accommodation' => 'Teahouse',
            'image' => 'manaslu.jpg',
        ]);
    }

    /** @test */
    public function recommendation_form_loads()
    {
        $response = $this->get('/recommend'); // Adjust the route as necessary
        $response->assertStatus(200);
        $response->assertSee('Trek Recommendation'); // Adjust based on your actual view
    }

    /** @test */
    public function perfect_match_recommendation()
    {
        // Simulate a user and submit a recommendation request
        $response = $this->post('/recommend/process', [
            'price_min' => 80000,
            'price_max' => 100000,
            'duration_days' => 14,
            'group_size' => 'Solo',
            'difficulty' => 'Hard',
            'accommodation' => 'Teahouse',
            'region' => 'Manaslu',
            'best_season' => 'Autumn',
        ]);

        $response->assertStatus(200);
        $response->assertSee('Perfect Matches'); // Adjust based on your actual view
        $response->assertSee('Manaslu Circuit'); // Check if the trek is in the response
    }
}
