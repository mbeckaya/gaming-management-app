<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index() {
        return Genre::all();
    }

    public function show($id) {
        $genre = Genre::findOrFail($id);

        return $genre;
    }

    public function store(Request $request) {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);

        return response($genre, 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($validated);

        return $genre;
    }

    public function destroy($id) {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return response(null, 204);
    }
}
