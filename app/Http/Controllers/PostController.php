<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;
        $page = $request->page ?? 1;
        $blogs = Post::where('visibility', 'public')->latest()->with('user')->simplePaginate($perPage, ['*'], 'page', $page);

        return ApiFormatter::sendResponse('success', 200, 'Blogs retrieved successfully.', $blogs);
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
        $validated = $request->validate([
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'image' => 'nullable|string',
            'type' => 'required|in:article,story',
            'content' => 'required|string',
            'visibility' => 'required|in:public,private,only_connection'
        ]);

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        return ApiFormatter::sendResponse('success', 201, 'Blog created successfully.', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return ApiFormatter::sendResponse('success', 200, 'Blog retrieved successfully.', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
