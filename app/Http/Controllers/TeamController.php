<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the teams.
     */
    public function index()
    {
        $teams = Team::all();
        return response()->json($teams);
    }

    /**
     * Store a newly created team in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $team = Team::create([
            'name' => $validated['name'],
            'country_id' => $validated['country_id'],
        ]);

        return response()->json($team, 201);
    }

    /**
     * Display the specified team.
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        return response()->json($team);
    }

    /**
     * Update the specified team in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $team = Team::findOrFail($id);
        $team->update($validated);

        return response()->json($team);
    }

    /**
     * Remove the specified team from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return response()->json(null, 204);
    }
}
