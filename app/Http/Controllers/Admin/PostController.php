<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class PostController extends Controller
{
    public function index(Request $request): Response
    {
        $params = $request->query();
        $posts = Post::query()
            ->with(['user', 'category'])
            ->when(data_get($params, 'keyword'), fn($query) => $query->where('title', 'like', '%' . $params['keyword'] . '%'))
            ->when(data_get($params, 'category_id'), fn($query) => $query->where('category_id', $params['category_id']))
            ->when(data_get($params, 'user_id'), fn($query) => $query->where('user_id', $params['user_id']))
            ->when(data_get($params, 'date_range.start'), fn($query) => $query->whereBetween('created_at', [$params['date_range']['start'], $params['date_range']['end']]))
            ->paginate(10);
        $categories = Category::all();
        $users = User::all();
        return Inertia::render('admin/posts/index', [
            'posts' => $posts,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    public function create(): Response
    {
        $categories = Category::all();
        return Inertia::render('admin/posts/create', [
            'categories' => $categories,
        ]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $validated['thumbnail_url'] = $request->file('thumbnail')->store('thumbnails', 'public');
            }

            Post::query()->create([...$validated, 'user_id' => auth()->id()]);

            return redirect()->route('admin.posts.index')->with('success', 'Đăng bài viết thành công');
        }
        catch (Throwable $throwable) {
            return back()->with('error', 'Đăng bài thất bại');
        }
    }

    public function show(Request $request, Post $post): Response
    {
        $categories = Category::getAll();
        $post->thumbnail_url = Storage::url($post->thumbnail_url);
        return Inertia::render('admin/posts/edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();

        // Xử lý xoá ảnh nếu được yêu cầu
        if ($request->boolean('delete_thumbnail') && $post->thumbnail_url) {
            Storage::disk('public')->delete($post->thumbnail_url);
            $validated['thumbnail_url'] = null;
        }

        // Nếu người dùng upload ảnh mới
        if ($request->hasFile('thumbnail')) {
            // Xoá ảnh cũ nếu có
            if ($post->thumbnail_url) {
                Storage::disk('public')->delete($post->thumbnail_url);
            }

            // Lưu ảnh mới
            $validated['thumbnail_url'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Cập nhật bài viết
        $post->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
            'thumbnail_url' => $validated['thumbnail_url'] ?? $post->thumbnail_url,
        ]);

        return back()->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy(Post $post): RedirectResponse
    {
        try {
            if ($post->thumbnail_url) {
                Storage::disk('public')->delete($post->thumbnail_url);
            }
            $post->delete();
            return back()->with('success', 'Xoá bài viết thành công.');
        } catch (Throwable $throwable) {
            return back()->with('error', 'Xoá bài viết thất bại.');
        }

    }
}
