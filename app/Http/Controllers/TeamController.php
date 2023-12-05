<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\MyTeam;
use App\Models\Team;
use App\Models\Player;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (Auth::user()->role == 1){

            $teams = Team::all();
            return view ('league.manage-team')->with([
                'teams'=>$teams
            ]);
        }

        else
        return view ('profile.my-teams');
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
        $data = $request->all();

        $team = new MyTeam();
        // Extracting relevant data
        $roles = $data['roles'];
        $playerIDs = $data['playerIDs'];
        $teamNames = $data['teamNames'];
        $reserves = $data['reserves'];
        $reserveIDs = $data['reserveIDs'];
        $reserveTeamNames = $data['reserveTeamNames'];

        // Creating an instance of MyTeam and filling the attributes
        $team->user = Auth::user()->id; // Replace 'your_user_value' with the actual user value
        $team->game = Session::get('game_id'); // Replace 'your_game_value' with the actual game value
        $team->fill([
            'EXP Laner' => $playerIDs[0],
            'Jungler' => $playerIDs[1],
            'Mid Laner' => $playerIDs[2],
            'Gold Laner' => $playerIDs[3],
            'Roamer' => $playerIDs[4],
            'Reserve_1' => $reserveIDs[0],
            'Reserve_2' => $reserveIDs[1],
            'Reserve_3' => null,
            'Reserve_4' => null, // Assuming Reserve_4 and Reserve_5 are not provided in the data
            'Reserve_5' => null,
        ]);

        $team->save();
    
        return response()->json(['message' => 'Data stored successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myTeam = MyTeam::where('user',$id)->first();
        $players = Player::all();
        return view ('profile.team-details')->with([
            'myTeam' => $myTeam,
            'players' => $players
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $myTeam = MyTeam::w
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::find($id);

        $team->status = $request->input('status') ? 1 : 0;
        $team->label = $request->input('label');

        $team->save();

        $players = Player::where('team', $id)->get();

        foreach ($players as $player){
            $player->status = $request->input('status') ? 1 : 0;
            $player->label = $request->input('label');
            $player->save();
        }

        $teams = Team::all();
            return view ('league.manage-team')->with([
                'teams'=>$teams
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
