<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\Team;
use App\Models\League;
use App\Models\Player;

use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::orderBy('id', 'desc')->get();
        $teams = Team::get();
        $players = Player::orderBy('game')->get();
        $leagues = League::orderBy('id', 'desc')->get();
        if (Auth::check() && Auth::user()->role == 1){
            return view ('league.admin.player-list')->with([
                'games'=>$games,
                'leagues'=>$leagues,
                'players'=>$players,
                'teams'=>$teams,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        if ($id == "updateAll") {
            // Loop through the submitted data and update the corresponding player records
            foreach ($data['players'] as $playerData) {
                // return $playerData;
                $player = Player::find($playerData['id']);

                if ($player) {
                    // Update player attributes
                    $player->name = $playerData['name'];
                    $player->team = $playerData['team'];
                    $player->nationality = $playerData['nationality'];
                    $player->picture = $playerData['picture'];
                    $player->role = $playerData['role'];
                    $player->label = $playerData['label'];
                    $player->score = $playerData['score'];
                    
                    // Save the player record
                    $player->save();
                }
            }
        }

        return back()->with('success', 'Players updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Player::truncate();

        return back()->with('All players has been reset');
    }
}
