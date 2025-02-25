<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->limit ?? 10;
        $page = $request->page ?? 1;
        $posts = Blog::latest()
            ->with('user')
            ->paginate($perPage, ['*'], 'page', $page);

        return ApiFormatter::sendResponse('success', 200, 'Posts retrieved successfully.', $posts);
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

        // Jika tidak ada file, berarti ini request buat simpan artikel
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['user_id'] = Auth::id();
        $data['image'] = $request->file('image')->store('images/blog', 'public');
        $data['likes'] = [];
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);

        $blog = Blog::create($data);

        return ApiFormatter::sendResponse('success', 201, 'Post created successfully.', $blog);
    }



    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return ApiFormatter::sendResponse('success', 200, 'Post retrieved successfully.', $blog->load('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
