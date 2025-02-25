<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Blog;
use Illuminate\Http\Request;
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
            ->with('user', 'likes')
            ->paginate($perPage, ['*'], 'page', $page);

        $posts->getCollection()->transform(function ($post) {
            $post->is_liked = $post->isLikedBy(Auth::user());
            return $post;
        });

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
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required|in:Fashion,Beauty,Travel,Lifestyle,Personal,Technology,Health,Fitness,Healthcare,SaaS Services,Business,Education,Food & Recipes,Love & Relationships,Alternative Topics,Eco-Friendly Living,Music,Automotive,Marketing,Internet Services,Finance,Sports,Entertainment,Productivity,Hobbies,Parenting,Pets,Photography,Farming,Art,Homemade,Science,Games,History,Self-Development,News & Current Affairs',
            'content' => 'required',
        ]);

        $blog = Blog::create($data);

        return ApiFormatter::sendResponse('success', 201, 'Blog created successfully.', $blog);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
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
