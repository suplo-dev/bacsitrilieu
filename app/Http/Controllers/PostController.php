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
        $post->thumbnail_url = Storage::url($post->thumbnail_url);
        return Inertia::render('ViewPost', [
            'post' => $post,
//            'categories' => $categories,
        ]);
    }
}
