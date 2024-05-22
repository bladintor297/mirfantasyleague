<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;
use App\Models\Game;
use App\Models\MyTeam;

class CaptainController extends Controller
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
        $myTeams = MyTeam::find($id);
        $players = Player::where('game', $myTeams->game)->get();

        // $id refers to game->id

        $game = Game::with(['league' => function ($query) {
            $query->select('id', 'league_name');
        }])->find($myTeams->game);


        return view ("league.captain-selection")->with([
            'myteam' => $myTeams,
            'players' => $players,
            'game' => $game
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
        if ($request->input('selected_captain') == null || $request->input('selected_vice_captain') == null)
            return back()->withError('Something went wrong. Please reselect captain and vice captain. If error persist, reload the page.');

        else {
            $myteam = MyTeam::find($id);

            $myteam->captain = $request->input('selected_captain');
            $myteam->vice_captain = $request->input('selected_vice_captain');

            $allcolumns = ['EXPLaner', 'Jungler', 'MidLaner', 'GoldLaner', 'Roamer','Reserve_1', 'Reserve_2', 'Reserve_3', 'Reserve_4', 'Reserve_5', 'captain', 'vice_captain'];
            $noReserveColumns = ['EXPLaner', 'Jungler', 'MidLaner', 'GoldLaner', 'Roamer', 'captain', 'vice_captain'];
            
            $players = Player::where('game', $myteam->game)->get();
            $game = Game::with(['league' => function ($query) {
                $query->select('id', 'league_name');
            }])->find($myteam->game);

            $isComplete = 0;
            if (!$game->reserve_isOn) {
                // Check primary team members
                foreach ($noReserveColumns as $column) {
                    if (is_null($myteam->$column)) {
                        $isComplete = 0;
                        break; // Once any member is found null, no need to continue checking
                    } else {
                        $isComplete = 1; // If all primary team members are not null, set isComplete to 1
                    }
                }
            }
            
            
            else {
                // Check primary team members and reserve members
                $reserveCount = 0;
                foreach ($allcolumns as $column) {
                    if (strpos($column, 'Reserve_') === 0 && !is_null($myteam->$column)) {
                        $reserveCount++;
                    } elseif (is_null($myteam->$column)) {
                        $isComplete = 0;
                        break; // Once any member is found null, no need to continue checking
                    } else {
                        $isComplete = 1; // If all primary team members are not null, set isComplete to 1
                    }
                }
            
                // Check if the reserve count matches the limit
                if ($reserveCount != $game->reserve_limit) {
                    $isComplete = 0;
                }
            }
            

            $myteam->isCompleted = $isComplete;
            $myteam->save();

            

            return view ('profile.my-team')->with([
                'myteam' => $myteam,
                'players' => $players,
                'game' => $game
            ]);
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
