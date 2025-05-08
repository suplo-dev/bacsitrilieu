<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category): Response
    {
        $categories = Category::all();
        $post->update(['real_view' => $post->real_view + 1]);
        $post->load(['relatedPosts' => fn ($query) => $query->limit(10)]);
        return Inertia::render('ViewPost', [
            'post' => $post,
            'related_post' =>  $post->relatedPosts
//            'categories' => $categories,
        ]);
    }
}
