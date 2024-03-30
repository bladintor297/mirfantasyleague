<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\Game;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::get();
        $curLeague = League::orderBy('id', 'desc')->first();
        $curGame = Game::orderBy('id', 'desc')->first();
        $totalScores = Score::selectRaw('*, (day1 + day2 + day3 + day4 + day5 + day6) as total_score')
                    ->join('users', 'users.id', '=', 'score.user_id')
                    ->where('game_id', $curGame->id)
                    ->orderBy('total_score', 'desc')
                    ->get(['score.*', 'users.username', 'users.team_name', 'users.id AS userid', 'users.team_logo']);
        
        $totalScores = $totalScores->sortByDesc('total_score')->values();

        return view ('test')->with([
            'totalScores'=>$totalScores,
            'game'=>$curGame,
            'league' => $curLeague,
            // 'playerScores'=>$playerScores,
            'teams' => $teams,
            'id' => 0
        ]);;
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
