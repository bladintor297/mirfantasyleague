<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\League;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leagues = League::get();
        $games = Game::leftJoin('league', 'game.league_id', '=', 'league.id')
                ->select(['game.*', 'league.league_name as league_name'])
                ->get();
        return view ('league.admin.game-list')->with([
            'games' => $games,
            'leagues' => $leagues
        ]);
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
        // Create a new Game instance
        $game = new Game();
        
        // Fill the Game instance with form data
        $game->league_id = $request->input('league');
        $game->name = $request->input('name');
        $game->status = $request->input('status');
        $game->team_num = $request->input('team_num');
        $game->brief_info = $request->input('brief_info');
        $game->instructions = $request->input('instructions');
        $game->reserve_rule = $request->input('reserve_rule');
        $game->transfer_rule = $request->input('transfer_rule');
        $game->reserve_limit = $request->input('reserve_limit');
        $game->player_rule = $request->input('player_rule');
        $game->scoring = $request->input('scoring');
        $game->player_limit = $request->input('player_limit');
        $game->import_limit = $request->input('import_limit');


        // Save the Game instance to the database
        $game->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Game created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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


        if ($id == "updateAll"){
            // Loop through the submitted data and update the corresponding records
            foreach ($data['games'] as $gameData) {
                $game = Game::find($gameData['id']);

                if ($game) {


                    $game->league_id  = $gameData['league_id'];
                    // Update Status
                    $status = $gameData['status'];
                    $game->status = $status;

                    // Check Transfer Window Rule (TW Rule)
                    $transferIsOn = isset($gameData['transfer_isOn']) ? 1 : 0;
                    $game->transfer_isOn = $transferIsOn;

                    // Check Player Limit Rule (PL Rule)
                    $playerIsOn = isset($gameData['player_isOn']) ? 1 : 0;
                    $game->player_isOn = $playerIsOn;
                    if ($playerIsOn) {
                        $game->player_limit = $gameData['player_limit'];
                    }

                    // Check Reserve Player Rule (RP Rule)
                    $reserveIsOn = isset($gameData['reserve_isOn']) ? 1 : 0;
                    $game->reserve_isOn = $reserveIsOn;
                    if ($reserveIsOn) {
                        $game->reserve_limit = $gameData['reserve_limit'];
                    }

                    // Check and reset reserves if needed
                    if (isset($gameData['reset_reserve']) && $gameData['reset_reserve']) {
                        $myTeams = MyTeam::where('game', $game->id)->get();

                        foreach ($myTeams as $myTeam) {
                            for ($i = 1; $i <= 5; ++$i) {
                                $myTeam->{'Reserve_' . $i} = null;
                            }
                            $myTeam->save();
                        }
                    }

                    // Save the game record
                    $game->save();
                }
            }
        }

        else {
            $game = Game::find($id);

            $game->brief_info = $request->input('brief_info');
            $game->instructions = $request->input('instructions');
            $game->player_rule = $request->input('player_rule');
            $game->transfer_rule = $request->input('transfer_rule');
            $game->scoring = $request->input('scoring_rule');

            $game->save();
        }
        

        return back()->with('success', 'Games updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
