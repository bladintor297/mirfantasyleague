<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\MyTeam;
use App\Models\Game;
use App\Models\Player;

class MyTeamController extends Controller
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
    public function show(string $id, Request $request)
    {
            $label = $request->input('label');

            $myTeam = MyTeam::find($id);
            $game = Game::find ($myTeam->game);

            $players = Player::join('team', 'player.team', '=', 'team.id')
                    ->select('player.*', 'team.team_name as team_name')
                    ->where('team.label', $label)
                    ->get();


            return view ("league.select-hero")->with([
                'game' => $game,
                'players' => $players,
                'myTeam' => $myTeam,
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
         // Player Selection
        if ($id == 'TeamSelect' || $id == 4){
            
            $game = Game::find ($request->input('game_id'));
            $players = Player::join('team', 'player.team', '=', 'team.id')
                    ->select('player.*', 'team.team_name as team_name')
                    ->get();

            $game->term_isRead = 1;
            $game->save();

            $myTeam = MyTeam::where('game', $request->input('game_id'))->where('user', Auth::user()->id)->get();

            if (count($myTeam) == 0){
                $labels = ['A', 'B', 'C', 'D']; 
                for ($i = 0; $i < $game->team_num; ++$i){
                    $newTeam = new MyTeam();
                    $newTeam->label = $labels[$i];
                    $newTeam->user = Auth::user()->id;
                    $newTeam->game = $request->input('game_id');
                    $newTeam->save();
                }
            }

            if ($id == 4){
                $myTeam = MyTeam::find($request->input('myTeam_id'));
                $myTeam->isCompleted = 1;
                $myTeam->save();
            }

            $myTeams = MyTeam::where('game', $request->input('game_id'))->where('user', Auth::user()->id)->get();

            return view ("league.select-game")->with([
                'game' => $game,
                'players' => $players,
                'myTeams' => $myTeams,
            ]);
        }

        // Player Confirmation
        else if ($id == 1){

            $requestData = $request->all();


            // Check for null values in the request data
            foreach ($requestData as $key => $value) {
                if ($value === null || $value === '+') {
                    // Return an error response indicating that a null value is not allowed
                    return back()->withError('There\'s an error to set your team. Please try again. If similar error occurs, contact admin.');
                }
            }
            
            $myTeam = MyTeam::find($request->input('myTeam_id'));
            $myTeam->EXP_Laner = $request->input('playerID0');
            $myTeam->Jungler = $request->input('playerID1');
            $myTeam->Mid_Laner = $request->input('playerID2');
            $myTeam->Gold_Laner = $request->input('playerID3');
            $myTeam->Roamer = $request->input('playerID4');

            $myTeam->save();

            $players = Player::join('team', 'player.team', '=', 'team.id')
                        ->select('player.*', 'team.team_name as team_name')
                        ->get();
            

            $game = Game::find (Session::get('game_id'));
            $myTeam = MyTeam::find($request->input('myTeam_id'));
            return view('league.confirm-players')->with([
                'players' => $players,
                'step' => 3,
                'game' => $game,
                'myTeam' => $myTeam,
            ]);
        }


        // Reserve Selection
        else if ($id == 2) {
            $game = Game::find ($request->input('game_id'));
            $myTeam = MyTeam::find($request->input('myTeam_id'));
            $captain = $request->input('captain');  // Access the selected captain value
            $viceCaptain = $request->input('vice_captain');  // Access the selected vice-captain value

            $myTeam->captain = $captain;
            $myTeam->vice_captain = $viceCaptain;
            $myTeam->save();

            if ($game->reserve_isOn == 1){
                $game->term_isRead = 1;
                $game->save();

                
    
                $players = Player::join('team', 'player.team', '=', 'team.id')
                        ->select('player.*', 'team.team_name as team_name')
                        ->get();
                $game = Game::find($request->input('game_id'));
                return view ("league.select-reserve")->with([
                    'game' => $game,
                    'players' => $players,
                    'myTeam' => $myTeam
                ]);
            }

            else {
                $players = Player::join('team', 'player.team', '=', 'team.id')
                        ->select('player.*', 'team.team_name as team_name')
                        ->get();
                $game = Game::find($request->input('game_id'));
                $myTeam = MyTeam::find($request->input('myTeam_id'));

                return view ("league.team-submission")->with([
                    'game' => $game,
                    'players' => $players,
                    'myTeam' => $myTeam
                ]);
            }
            
        }
        
        // Reserve Confirmation
        else if ($id == 3) {

            $game = Game::find($request->input('game_id'));
            $myTeam = MyTeam::find($request->input('myTeam_id'));
            $selectedPlayersCount = 0;
            
            for ($reserveKey = 0; $reserveKey < 5; $reserveKey++) {
                $inputKey = 'reserveID' . $reserveKey;
                $inputValue = $request->input($inputKey);
            
                // If the input value is not '+', increment the count and set the corresponding $myTeam property
                if ($inputValue !== null) {
                    $selectedPlayersCount++;
            
                    // If the count exceeds 3, return an error response
                    if ($selectedPlayersCount > $game->reserve_limit) {
                        return response()->json(['error' => 'Selected reserves cannot exceed ('. $game->reserve_limit .') players.'], 400);
                    }
            
                    // Set the corresponding $myTeam property
                    $myTeam->{'Reserve_' . ($reserveKey + 1)} = $inputValue;
                } else {
                    // If the input value is '+', set the property to null
                    $myTeam->{'Reserve_' . ($reserveKey + 1)} = null;
                }
            }
            
            // Save the changes to the $myTeam model
            $myTeam->save();

            $players = Player::join('team', 'player.team', '=', 'team.id')
                        ->select('player.*', 'team.team_name as team_name')
                        ->get();
            
            return view ("league.team-submission")->with([
                    'game' => $game,
                    'players' => $players,
                    'myTeam' => $myTeam
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
