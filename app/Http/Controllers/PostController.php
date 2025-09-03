<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('posts/Index', [
            'posts' => PostResource::collection(Post::with('user')->latest()->paginate()),
        ]);
    }

    public function store(Request $request): Post
    {
        $data = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        return Post::create($data);
    }

    public function show(Post $post): Response
    {
        $post->load('user');

        return Inertia::render('posts/Show', [
            'post' => PostResource::make($post),
        ]);
    }

    public function update(Request $request, Post $post): Post
    {
        $data = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $post->update($data);

        return $post;
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json();
    }
}
