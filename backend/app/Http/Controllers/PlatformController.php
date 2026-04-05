<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformController extends Controller
{
    public function index() {
        return Platform::all();
    }

    public function show($id) {
        $platform = Platform::findOrFail($id);

        return $platform;
    }

    public function store(Request $request) {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $platform = Platform::create($validated);

        return response($platform, 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $platform = Platform::findOrFail($id);
        $platform->update($validated);

        return $platform;
    }

    public function destroy($id) {
        $platform = Platform::findOrFail($id);
        $platform->delete();

        return response(null, 204);
    }
}
