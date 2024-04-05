<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adv;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advs = Adv::get();

        return view ('league.admin.manage-adv')->with([
            'advs' => $advs,
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
        $currAdv = Adv::OrderBy('id','desc')->first();
        $id = ($currAdv === null) ? 1 : ($currAdv->id + 1);

        $adv = new Adv();
        $adv->adv_name = $request->input('adv_name');
        $adv->hyperlink = $request->input('hyperlink');

        // Store the uploaded poster
        $path = public_path('assets/img/home/advertisement/');
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        // Check if a file is uploaded and move it to the destination folder
        if ($request->hasFile('poster')) {
            $posterName = 'adv' . $id. '.' . $request->file('poster')->getClientOriginalExtension();
            $request->file('poster')->move($path, $posterName);
            $adv->poster = $posterName;
        } else {
            // Handle case where no file is uploaded
            // You may want to set a default poster or handle this differently based on your application's logic
            return back()->withError('The was an error while uploading the iamge');
        }

        $adv->save();

        return back()->with('success', 'Advertisement added successfully!');
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
        // Loop through each adv data and update accordingly
        foreach ($request->advs as $advData) {
            
            $adv = adv::findOrFail($advData['id']);
            $adv->adv_name = $advData['adv_name'];
            $adv->hyperlink = $advData['hyperlink'];

            if (isset($advData['poster'])) {
                // Store the uploaded poster
                $path = public_path('assets/img/home/advertisement/');
                !is_dir($path) && mkdir($path, 0777, true);
                
                $posterName = 'adv'.$adv->id . '.' . $advData['poster']->extension();
                $advData['poster']->move($path, $posterName);

                // Update the poster path in the database
                $adv->poster = $posterName;
            }

            $adv->save();
        }

        return back()->with('success', 'Advertisement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
