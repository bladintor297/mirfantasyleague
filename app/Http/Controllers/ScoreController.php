<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Score;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::join('league', 'game.league_id', '=', 'league.id')
                ->select('game.*', 'league.league_name as league_name')
                ->get();

        $totalScore = Score::selectRaw('*, (day1 + day2 + day3 + day4 + day5 + day6) as total_score')
                    ->join('users', 'users.id', '=', 'score.user_id')
                    ->orderBy('total_score', 'desc')
                    ->get(['score.*', 'users.username', 'users.team_name', 'users.id AS userid', 'users.team_logo']);
        
        $totalScore = $totalScore->sortByDesc('total_score')->values();

        return view ('scoreboard.main-score')->with([
            'games' => $games,
            'totalScore' => $totalScore
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


        return view ('league.edit-score')->with([
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

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        Excel::import(new ScoreImport, $file);

        return redirect()->route('your.route')->with('success', 'Excel file imported successfully.');
    }
}
