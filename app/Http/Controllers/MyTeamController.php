<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Player;
use App\Models\Game;
use App\Models\MyTeam;

class MyTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myteam = MyTeam::where('user', Auth::id())->orderBy('id', 'desc')->first();
        $players = Player::where('game', $myteam->game)->get();
        $game = Game::find($myteam->game);

        return view ('profile.my-team')->with([
            'myteam' => $myteam,
            'players' => $players,
            'game' => $game
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

        // $id refers to game->id

        $game = Game::with(['league' => function ($query) {
            $query->select('id', 'league_name');
        }])->find($id);

        // Check if MyTeams for n teams already exist
        $myteam = MyTeam::where('game', $id)->where('user', Auth::user()->id)->get(); // Change 1 -> Auth::user()->id
        $players = Player::where('game', $id)->get();

        if (count($myteam) == 0){
            $labels = ['A', 'B', 'C', 'D']; 
            for ($i = 0; $i < $game->team_num; ++$i){
                $newTeam = new MyTeam();
                $newTeam->label = $labels[$i];
                $newTeam->user = Auth::user()->id; // Change 1 -> Auth::user()->id
                $newTeam->game = $id;
                $newTeam->save();
            }
        }

        // Refresh New Teams
        $myteams = MyTeam::where('game', $id)->where('user', Auth::user()->id)->get(); // Change 1 -> Auth::user()->id

        return view ("league.team-card")->with([
            'myteams' => $myteams,
            'players' => $players,
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($id == "terms"){
            
            $game = Game::find($request->input('game_id'));
            $myteams = MyTeam::where('game', $game->id)->where('user', Auth::user()->id)->get();

            foreach ($myteams as $myteam){
                $myteam->term_isRead = 1;
                $myteam->save();
            }

            $game->save();
            return back();
        }

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

        return redirect()->back();
    }
}
