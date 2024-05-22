<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;
use App\Models\Game;
use App\Models\MyTeam;

class ReserveController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $myteam = MyTeam::find($id);
        $game = Game::find($myteam->game);
        $players = Player::where('game', $myteam->game)->get();

        if ($game->reserve_isOn) {
            
            // Check for teams limit
            $allcolumns = ['EXPLaner', 'Jungler', 'MidLaner', 'GoldLaner', 'Roamer','Reserve_1', 'Reserve_2', 'Reserve_3', 'Reserve_4', 'Reserve_5'];
            $rsvcolumns = ['Reserve_1', 'Reserve_2', 'Reserve_3', 'Reserve_4', 'Reserve_5'];
            $teamCounts = [];
            $countryCounts = ['Malaysia' => 0];
            $limit = $game->player_limit; // Change this to your desired limit
            $foreignPlayerReached = false;

            // Check for players from same team
            foreach ($allcolumns as $column) {
                $playerId = $myteam->$column; // Get the player ID from the current column
                if ($playerId !== null) { // Check if the column has a player ID
                    $player = $players->where('id', $playerId)->first(); // Find the player in the players collection
                    if ($player !== null) { // Check if the player is found
                        $teamId = $player->team; // Get the team ID of the player
                        if (!isset($teamCounts[$teamId])) {
                            $teamCounts[$teamId] = 0;
                        }
                        $teamCounts[$teamId]++;
                    }
                }
            }

            // Check for players from same country (import) 
            // 23 May: Latest update is IL 2 means 2 for main, 2 for reserve.
            foreach ($rsvcolumns as $column) {
                $playerId = $myteam->$column; // Get the player ID from the current column
                if ($playerId !== null) { // Check if the column has a player ID
                    $player = $players->where('id', $playerId)->first(); // Find the player in the players collection
                    if ($player !== null) { // Check if the player is found
                        $playerCountry = $player->nationality; // Get the country of the player
                        if ($playerCountry !== "Malaysia" && !isset($countryCounts[$playerCountry])) {
                            $countryCounts[$playerCountry] = 0;
                        }
                        $countryCounts[$playerCountry]++;
                    }
                }
            }

            $teamsExceedingLimit = [];
            // Check which teams exceed the limit
            foreach ($teamCounts as $teamId => $count) {
                if ($count >= $limit) {
                    $teamsExceedingLimit[] = $teamId;
                }
            }
            

            $foreignPlayersCount = 0;
            foreach ($countryCounts as $country => $count) {
                if ($country !== 'Malaysia') {
                    $foreignPlayersCount += $count;
                }
            }

            if ($foreignPlayersCount >= 2) {// Change this to your desired limit for foreign players
                $foreignPlayerReached = true;
            }

            $players = Player::where('game', $myteam->game)
                    ->whereNotIn('id', [$myteam->EXPLaner, $myteam->Jungler, $myteam->MidLaner, $myteam->GoldLaner, $myteam->Roamer])
                    ->get();
        
            $count = 0;
            $reservecolumns = ['Reserve_1', 'Reserve_2', 'Reserve_3', 'Reserve_4', 'Reserve_5'];
            
            foreach ($reservecolumns as $column) {
                if ($myteam->$column !== null) {
                    $count++;
                }
            }

            
            return view ('league.reserve-selection')->with([
                'players' => $players,
                'myteam' => $myteam,
                'game' => $game,
                'currentSlide' => 0,
                'count' => $count,
                'teamExceedLimit' =>  $teamsExceedingLimit,
                'foreignPlayerReached' =>  $foreignPlayerReached
            ]);
        }

        else {
            return redirect()->route('captain.show', ['captain' => $myteam]);
        }

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('captain.show', ['captain' => $myteam]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $myteam = MyTeam::find($id);

        $myteam->Reserve_1 = null;
        $myteam->Reserve_2 = null;
        $myteam->Reserve_3 = null;
        $myteam->Reserve_4 = null;
        $myteam->Reserve_5 = null;

        $myteam->save();

        return redirect()->back()->with([
            'count' => 0
        ]);

    }
}
