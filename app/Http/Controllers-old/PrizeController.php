<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('prize.prize-list');
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
        $path = public_path('assets/img/prizes/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

        if ($request->hasFile('overall-prize')) {
            $overall_prize = $request->file('overall-prize');
            $overall_prize->move($path, 'poster-2.png');
        }

        if ($request->hasFile('weekly-prize')) {
            $weekly_prize = $request->file('weekly-prize');
            $weekly_prize->move($path, 'poster-4.png');
        }

        return redirect()->back()->with('success', 'Prize poster has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
