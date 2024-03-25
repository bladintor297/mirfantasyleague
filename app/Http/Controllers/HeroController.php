<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;
use App\Models\Game;
use App\Models\MyTeam;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('league.hero-selection');
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
        $players = Player::where('game', $id)->get();

        return view ('league.hero-selection')->with([
            'players' => $players
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myteam = MyTeam::find($id);
        $players = Player::where('game', $myteam->game)->get();
        $game = Game::find($myteam->game);

        // Check for teams limit
        $allcolumns = ['EXPLaner', 'Jungler', 'MidLaner', 'GoldLaner', 'Roamer','Reserve_1', 'Reserve_2', 'Reserve_3', 'Reserve_4', 'Reserve_5'];
        $teamCounts = [];
        $countryCounts = ['Malaysia' => 0];
        $limit = $game->player_limit; // Change this to your desired limit
        $foreignPlayerReached = false;

        // Iterate over each column in $myteam
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

        $myteam->captain = null;
        $myteam->vice_captain = null;

        $myteam->save();

        return view ('league.hero-selection')->with([
            'players' => $players,
            'myteam' => $myteam,
            'currentSlide' => 0,
            'count' => 0,
            'teamExceedLimit' =>  $teamsExceedingLimit,
            'foreignPlayerReached' =>  $foreignPlayerReached
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Get all inputs from the request
        $inputs = $request->except(['_token', '_method', 'currentSwiper']);
        $currentSlide = $request->input('currentSwiper') + 1;
        
        // Filter out null inputs
        $validInputs = array_filter($inputs, function($value) {
            return $value !== null;
        });

        // Now $validInputs will contain only non-null inputs

        // Accessing input values by their names and save them to the database
        foreach ($validInputs as $columnName => $value) {
            // Assuming your model is MyTeam and the primary key is 'id'
            $team = MyTeam::findOrFail($id);
            $team->$columnName = $value;
            $team->save();
        }

        // Only to be used by reserve to determine reserve limit
        $myteam = MyTeam::find($id);
        $players = Player::where('game', $myteam->game)->get();
        $game = Game::find($myteam->game);
        $count = 0;
        $reservecolumns = ['Reserve_1', 'Reserve_2', 'Reserve_3', 'Reserve_4', 'Reserve_5'];
        
        foreach ($reservecolumns as $column) {
            if ($myteam->$column !== null) {
                $count++;
            }
        }

        // Check for teams limit
        $allcolumns = ['EXPLaner', 'Jungler', 'MidLaner', 'GoldLaner', 'Roamer','Reserve_1', 'Reserve_2', 'Reserve_3', 'Reserve_4', 'Reserve_5'];
        $teamCounts = [];
        $countryCounts = ['Malaysia' => 0];
        $limit = $game->player_limit; // Change this to your desired limit
        $foreignPlayerReached = false;

        // Iterate over each column in $myteam
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


        return redirect()->back()->with([
            'currentSlide' => $currentSlide,
            'count' => $count,
            'game' => $game,
            'teamExceedLimit' =>  $teamsExceedingLimit,
            'foreignPlayerReached' =>  $foreignPlayerReached
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $myteam = MyTeam::find($id);

        $myteam->EXPLaner = null;
        $myteam->Jungler = null;
        $myteam->MidLaner = null;
        $myteam->GoldLaner = null;
        $myteam->Roamer = null;
        $myteam->captain = null;
        $myteam->vice_captain = null;
        $myteam->isCompleted = 0;

        $myteam->save();

        return redirect()->back()->with([
            'count' => 0
        ]);
    }
}
