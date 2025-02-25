<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\CommentBlog;
use Illuminate\Http\Request;

class CommentBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($blog_id)
    {
        $comments = CommentBlog::where('blog_id', $blog_id)->with('user:id,name')->get();
        return ApiFormatter::sendResponse('success', 200, 'Comments retrieved successfully.', $comments);
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
    public function store(Request $request, $blog_id)
    {

        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment = CommentBlog::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'blog_id' => $blog_id
        ]);

        return ApiFormatter::sendResponse('success', 201, 'Comment posted successfully.', $comment->load('user:id,name'));
    }


    /**
     * Display the specified resource.
     */
    public function show(CommentBlog $commentBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommentBlog $commentBlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommentBlog $commentBlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommentBlog $commentBlog)
    {
        $commentBlog->delete();
        return ApiFormatter::sendResponse('success', 200, 'Comment deleted successfully.');
    }
}
