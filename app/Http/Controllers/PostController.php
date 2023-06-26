<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    /**
     * @param $idPost
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($idPost): JsonResponse
    {
        $post = Post::with(['comments', 'comments.writer', 'owner'])->findOrFail($idPost);
        $post->makeHidden(['user', 'comment', 'active', 'public', 'pending']); // Remove bool data and user (incluyed in owner)
        return response()->json(['body' => $post]);
    }
}
