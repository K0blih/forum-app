<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): Collection
    {
        return Post::all();
    }

    public function store(Request $request): Post
    {
        $data = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        return Post::create($data);
    }

    public function show(Post $post): Post
    {
        return $post;
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
