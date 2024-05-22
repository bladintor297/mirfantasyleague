<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

        $path = public_path('assets/img/home/feed/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
        

        foreach ($request->posts as $postData) {
            $post = Post::findOrFail($postData['id']);
            $post->title = $postData['title'];
            
            // Handle image upload if provided
            if ($request->hasFile('posts.' . $postData['id'] . '.image')) {

                $image = $request->file('posts.' . $postData['id'] . '.image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move($path, $imageName);
                $post->image = $imageName;
                $post->save();

            }

            $post->save();
        }

        return redirect()->back()->with('success', 'Posts updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
