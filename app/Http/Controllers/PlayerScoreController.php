<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Game;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use App\Models\Adv;

class PlayerScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $teams = Team::get();
        $curLeague = League::orderBy('id', 'desc')->first();
        $curGame = Game::orderBy('id', 'desc')->first();

        $playerScores = Player::selectRaw('*, JSON_UNQUOTE(JSON_EXTRACT(score, "$[0]")) + JSON_UNQUOTE(JSON_EXTRACT(score, "$[1]")) + JSON_UNQUOTE(JSON_EXTRACT(score, "$[2]")) + JSON_UNQUOTE(JSON_EXTRACT(score, "$[3]")) + JSON_UNQUOTE(JSON_EXTRACT(score, "$[4]")) + JSON_UNQUOTE(JSON_EXTRACT(score, "$[5]")) as total_score')
                    ->where('game', $curGame->id)
                    ->orderBy('total_score', 'desc')
                    ->get();

        $advs = Adv::orderBy('id','desc')->get();

        return view ('score.player-score')->with([
            'game'=>$curGame,
            'league' => $curLeague,
            'playerScores'=>$playerScores,
            'teams' => $teams,
            'advs' => $advs,
            'id' => 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $game = Game::orderBy('id', 'desc')->first();
        $scores = Score::selectRaw('*, (day1 + day2 + day3 + day4 + day5 + day6) as total_score')
                ->join('users', 'users.id', '=', 'score.user_id')
                ->orderBy('total_score', 'desc')
                ->get(['score.*', 'users.username', 'users.team_name', 'users.id AS userid', 'users.team_logo']);
    
        $scores = $scores->where('game_id', $game->id)->sortByDesc('total_score')->values();

        $games = Game::leftJoin('league', 'game.league_id', '=', 'league.id')
                ->select(['game.*', 'league.league_name as league_name'])
                ->get();

        return view ('league.admin.edit-score')->with([
            'games' => $games,
            'scores' => $scores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 123;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $teams = Team::get();
        $curLeague = League::orderBy('id', 'desc')->first();
        $curGame = Game::orderBy('id', 'desc')->first();
        

        $playerScores = Player::selectRaw('*, JSON_UNQUOTE(JSON_EXTRACT(score, CONCAT("$[", ?, "]"))) as total_score', [$id-1])
                    ->where('game', $curGame->id)
                    ->get();
                        
        

        $advs = Adv::orderBy('id','desc')->get();

        return view ('score.player-score')->with([
            'game'=>$curGame,
            'league' => $curLeague,
            'playerScores'=>$playerScores->sortByDesc('total_score'),
            'advs' => $advs,
            'teams' => $teams,
            'id' => $id
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
        // Assuming $id is the identifier for your model (e.g., user_id)

        // Get the entries from the request
        $entries = $request->input('entries');

        // Loop through each entry
        foreach ($entries as $scoreId => $entry) {

            // You can access the values like this:
            $username = $entry['username'];
            $userId = $entry['user_id'];
            $day1 = $entry['day1'];
            $day2 = $entry['day2'];
            $day3 = $entry['day3'];
            $day4 = $entry['day4'];
            $day5 = $entry['day5'];
            $day6 = $entry['day6'];

            // Now you can use these values to update your model.
            // For example, assuming you have a score model:
            $score = Score::where('user_id', $userId)->first();
            // Update the score values
            $score->day1 = $day1;
            $score->day2 = $day2;
            $score->day3 = $day3;
            $score->day4 = $day4;
            $score->day5 = $day5;
            $score->day6 = $day6;
            $score->save();
        }

        $scores = Score::selectRaw('*, (day1 + day2 + day3) as total_score')
                    ->join('users', 'users.id', '=', 'score.user_id')
                    ->orderBy('total_score', 'desc')
                    ->get(['score.*', 'users.username', 'users.team_name', 'users.id AS userid' ]);
        $games = Game::leftJoin('league', 'game.league_id', '=', 'league.id')
                    ->select(['game.*', 'league.league_name as league_name'])
                    ->get();


        return view ('league.admin.edit-score')->with([
            'games' => $games,
            'scores' => $scores
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
