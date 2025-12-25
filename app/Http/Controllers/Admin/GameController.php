<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();

        // Search Functionality
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $query->orderBy('id', 'desc')->limit(1);
        $games = $query->paginate(1)->appends($request->query()); // Keep search parameters in pagination

        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create'); // Create a new view file
    }

    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'release_date' => 'required|date',
        ]);

        // Store game in database
        Game::create([
            'name' => $request->name,
            'time' => $request->time,
            'release_date' => $request->release_date,
        ]);

        // Redirect back to games list with success message
        return redirect()->route('admin.games.index')->with('success', 'Game added successfully!');
    }


    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return response()->json($game);
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->time = $request->input('time');
        $game->save();
    
        return response()->json(['success' => true, 'message' => 'Game updated successfully!']);
    }
    

}
