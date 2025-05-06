<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function show(Request $request, Post $post): Response
    {
        $categories = Category::getAll();
        $post->increment('real_view');
        $post->load(['relatedPosts' => fn ($query) => $query->where('id', '!=', $post->id)->limit(10)]);
        return Inertia::render('ViewPost', [
            'post' => $post,
            'related_post' =>  $post->relatedPosts
//            'categories' => $categories,
        ]);
    }
}
