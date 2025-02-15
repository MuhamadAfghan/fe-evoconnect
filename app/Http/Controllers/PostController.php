<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\CommentPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->limit ?? 10;
        $page = $request->page ?? 1;
        $posts = Post::where('visibility', 'public')
            ->latest()
            ->with('user', 'likes', 'user.educations')
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

    public function like(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        if ($post->isLikedBy($user)) {
            $post->likes()->where('user_id', $user->id)->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            return response()->json(['status' => 'liked']);
        }
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($id);
        $comment = new CommentPost();
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->content = $request->content;
        $comment->save();

        return response()->json(['status' => 'success', 'comment' => $comment->load('user')]);
    }
}
