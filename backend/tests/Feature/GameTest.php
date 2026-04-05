<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_all_games()
    {
        Game::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/games');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_returns_single_game()
    {
        $game = Game::factory()->create();

        $response = $this->getJson("/api/v1/games/{$game->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $game->id,
                     'title' => $game->title,
                 ]);
    }

    /** @test */
    public function it_returns_404_if_game_not_found()
    {
        $response = $this->getJson('/api/v1/games/999');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_creates_a_game()
    {
        $data = [
            'title' => 'Elden Ring',
            'platform_id' => null,
            'genre_id' => null,
            'publisher_id' => null,
            'is_physical' => true,
            'is_digital' => true,
            'release' => 2022,
        ];

        $response = $this->postJson('/api/v1/games', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Elden Ring',
                 ]);

        $this->assertDatabaseHas('games', [
            'title' => 'Elden Ring',
        ]);
    }

    /** @test */
    public function it_validates_required_fields_when_creating()
    {
        $response = $this->postJson('/api/v1/games', []);

        $response->assertStatus(500);
        $this->assertStringContainsString(
            'The title field is required',
            $response->json('message')
        );
    }

    /** @test */
    public function it_updates_a_game()
    {
        $game = Game::factory()->create();

        $response = $this->putJson("/api/v1/games/{$game->id}", [
            'title' => 'Updated Title'
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'title' => 'Updated Title'
                 ]);

        $this->assertDatabaseHas('games', [
            'id' => $game->id,
            'title' => 'Updated Title'
        ]);
    }

    /** @test */
    public function it_returns_404_when_updating_missing_game()
    {
        $response = $this->putJson('/api/v1/games/999', [
            'title' => 'Does not exist'
        ]);

        $response->assertStatus(404);
    }

    /** @test */
    public function it_deletes_a_game()
    {
        $game = Game::factory()->create();

        $response = $this->deleteJson("/api/v1/games/{$game->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('games', [
            'id' => $game->id
        ]);
    }

    /** @test */
    public function it_returns_404_when_deleting_missing_game()
    {
        $response = $this->deleteJson('/api/v1/games/999');

        $response->assertStatus(404);
    }
}