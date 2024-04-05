<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
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
        // Loop through each post data and update accordingly
        foreach ($request->posts as $postData) {
            $post = Post::findOrFail($postData['id']);
            $post->title = $postData['title'];

            if (isset($postData['image'])) {
                // Store the uploaded image
                $path = public_path('assets/img/home/feed/');
                !is_dir($path) && mkdir($path, 0777, true);
                
                $imageName = 'post'.$post->id . '.' . $postData['image']->extension();
                $postData['image']->move($path, $imageName);

                // Update the image path in the database
                $post->image = $imageName;
            }

            $post->save();
        }

        return back()->with('success', 'Posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
