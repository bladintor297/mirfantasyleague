<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;
use App\Models\Game;
use App\Models\Score;
use App\Models\MyTeam;
use App\Models\League;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all()->groupBy('league_id');

        // Fetch league information for the corresponding league_ids
        $mergedGames = $games->map(function ($groupedGames, $leagueId) {
            $leagueInfo = League::join('game', 'league.id', '=', 'game.league_id')
                ->where('game.league_id', $leagueId)
                ->select('league.id', 'league.league_name', 'league.description', 'league.logo')
                ->first();

            return [
                'league_id' => $leagueInfo->id,
                'league_name' => $leagueInfo->league_name,
                'description' => $leagueInfo->description,
                'logo' =>$leagueInfo->logo,
                'games' => $groupedGames,
            ];
        });

        return view("league.main-league")->with([
            'allGames' => $mergedGames,
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

        $league = new League();
        $league->league_name = $request->input('league_name');
        $league->description = $request->input('description');
        $league->logo = $request->input('logo');


        $league->save();

        return back()->with('success', 'League created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $players = Player::join('team', 'player.team', '=', 'team.id')
                ->select('player.*', 'team.team_name as team_name')
                ->get();
        $game = Game::find($id);
        if ($game->status != 1){
            return redirect()->route('league.index');
        }

        return view ("league.terms")->with([
            'game' => $game,
            'players' => $players,
            'teamRegistered' => 0,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($id == 1){
            $games = Game::leftJoin('league', 'game.league_id', '=', 'league.id')
                    ->select(['game.*', 'league.league_name as league_name'])
                    ->get();
            return view ('league.game-list')->with([
                'games' => $games
            ]);
        }

        else{
            $leagues =  League::orderBy('id', 'desc')->get();
            
            return view ('league.league-list')->with(['leagues' => $leagues]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($id == 1){
            $data = $request->all();

            // Loop through the submitted data and update the corresponding records
            foreach ($data['leagues'] as $leagueData) {
                $league = League::find($leagueData['id']);

                if ($league) {
                    // Update only if the data is different
                    if ($league->league_name !== $leagueData['league_name']) {
                        $league->league_name = $leagueData['league_name'];
                    }

                    if ($league->description !== $leagueData['description']) {
                        $league->description = $leagueData['description'];
                    }

                    if ($league->logo !== $leagueData['logo']) {
                        $league->logo = $leagueData['logo'];
                    }

                    $league->save();
                }
            }

            return back()->with('success', 'Leagues updated successfully!');
        }

        else {
            $status = 0;
            $reserveIsOn = 0;
            $playerIsOn = 0;
            $transferIsOn = 0;
    
            $game = Game::find($id);
    
            // Update Status
            if (request('status')) $status = 1;
            else $status = 0;
            $game->status = $status;
            
            // Check Transfer Window Rule (TW Rule)
            if (request('transfer_isOn')) $transferIsOn = 1;
            else $transferIsOn = 0;
            $game->transfer_isOn = $transferIsOn;
    
            // Check Player Limit Rule (PL Rule)
            if (request('player_isOn')) {
                $playerIsOn = 1;
                $game->player_limit = $request->player_limit;
            }
            else $playerIsOn = 0;
            $game->player_isOn = $playerIsOn;
    
            
            // Check Reserve Player Rule (RP Rule)
            if (request('reserve_isOn')) {
                $reserveIsOn = 1;
                $game->reserve_limit = $request->reserve_limit;
            }
            $game->reserve_isOn = $reserveIsOn;
    
            if (request('reset_reserve')){
                $myTeams = MyTeam::where('game', $game->id)->get();
    
                foreach ($myTeams as $myTeam){
                    for($i = 1; $i <= 5; ++$i){
                        $myTeam->{'Reserve_' . $i} = null;
                    }
                    $myTeam->save();
                }
            }
    
            $game->save();
            return redirect()->route('league.edit', ['league' => 1]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}