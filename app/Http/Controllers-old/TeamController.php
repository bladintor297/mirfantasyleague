<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\Game;
use App\Models\League;
use App\Models\Team;
use App\Models\Player;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $game = Game::orderBy('id','desc')->first();
        $teams = Team::where('game', $game->id)->get();
            return view ('league.admin.manage-team')->with([
                'teams'=>$teams
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::orderBy('id','desc')->first();
        $teams = Team::where('game', $game->id)->get();
            return view ('league.admin.manage-team')->with([
                'teams'=>$teams
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
        
            
        $teamsData = $request->input('teams');


        foreach ($teamsData as $teamId => $teamData) {

            // Find the team by ID
            $team = Team::findOrFail($teamId);

            // Update team details
            $team->team_name = $teamData['team_name'];
            $team->status = isset($teamData['status']) ? 1 : 0;
            $team->label = $teamData['label'];

            $players = Player::where('team', $teamId)->get();

            foreach ($players as $player){
                $player->status = $request->input('status') ? 1 : 0;
                $player->label = $request->input('label');
                $player->save();
            }

            // Handle logo update if provided
            if ($request->hasFile("teams.$teamId.logo")) {
                $logoPath = $request->file("teams.$teamId.logo")->store('logos');
                $team->logo = $logoPath;
            }

            $team->save();
        }

        return back()->with('success', 'Teams updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team::truncate();

        return back()->with('All teams has been reset');
    }
}
