<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('profile.my-account');
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
        // return $request->all();

        $user = User::find(Auth::user()->id);

        if ($id == 0){

            // Team Logo
            $path = public_path('assets/img/profile/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $imageName = Auth::user()->username. '.' . $request->team_logo->extension();
            $user->team_logo = $imageName;

            $request->team_logo->move($path, $imageName);
        }

        else {
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->team_name = $request->input('team_name');
            $user->phone = $request->input('phone');
            $user->ingame_id = $request->input('ingame_id');
            $user->ingame_name = $request->input('ingame_name');
            $user->ingame_server = $request->input('ingame_server');
        }

        

        $user->save();

        return back()->withSuccess('Profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
