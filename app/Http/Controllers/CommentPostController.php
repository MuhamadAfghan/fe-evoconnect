<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\CommentPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($post_id)
    {
        $post = Post::findOrFail($post_id);
        $comments = $post->comments()->with('user')->get();
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
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $post = Post::findOrFail($post_id);
        $comment = CommentPost::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

        return ApiFormatter::sendResponse('success', 201, 'Comment posted successfully.', $comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(CommentPost $commentPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommentPost $commentPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommentPost $commentPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($comment_id)
    {
        $comment = CommentPost::findOrFail($comment_id);
        $comment->delete();

        return ApiFormatter::sendResponse('success', 200, 'Comment deleted successfully.');
    }
}
