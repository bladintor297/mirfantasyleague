<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MyTeam;
use App\Models\Game;
use App\Models\Player;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $myTeam = MyTeam::find($id);
            $game = Game::find ($myTeam->game);

            $players = Player::join('team', 'player.team', '=', 'team.id')
                    ->select('player.*', 'team.team_name as team_name')
                    ->where('player.status', 1)
                    ->get();


            return view ("profile.team-details")->with([
                'game' => $game,
                'players' => $players,
                'myTeam' => $myTeam,
            ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
