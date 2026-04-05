<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index() {
        return Game::all();
    }

    public function show($id) {
        $game = Game::findOrFail($id);

        return $game;
    }

    public function store(Request $request) {
         $validated = $request->validate([
            'title' => 'required|string|max:255',
            'platform_id' => 'nullable|exists:platforms,id',
            'genre_id' => 'nullable|exists:genres,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            'is_physical' => 'required|boolean',
            'is_digital' => 'required|boolean',
            'release' => 'required|integer|min:1950|max:' . date('Y'),
        ]);

        $game = Game::create($validated);

        return response($game, 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'platform_id' => 'sometimes|nullable|exists:platforms,id',
            'genre_id' => 'sometimes|nullable|exists:genres,id',
            'publisher_id' => 'sometimes|nullable|exists:publishers,id',
            'is_physical' => 'sometimes|required|boolean',
            'is_digital' => 'sometimes|required|boolean',
            'release' => 'sometimes|required|integer|min:1950|max:' . date('Y'),
        ]);

        $game = Game::findOrFail($id);
        $game->update($validated);

        return $game;
    }

    public function destroy($id) {
        $game = Game::findOrFail($id);
        $game->delete();

        return response(null, 204);
    }
}
