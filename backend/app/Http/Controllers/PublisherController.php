<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index() {
        return Publisher::all();
    }

    public function show($id) {
        $publisher = Publisher::findOrFail($id);

        return $publisher;
    }

    public function store(Request $request) {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher = Publisher::create($validated);

        return response($publisher, 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->update($validated);

        return $publisher;
    }

    public function destroy($id) {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return response(null, 204);
    }
}
