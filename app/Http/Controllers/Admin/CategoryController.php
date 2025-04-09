<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class CategoryController extends Controller
{
    public function index(Request $request): Response
    {
        $params = $request->query();

        $categories = Category::query()
            ->when(data_get($params, 'keyword'), fn($query) => $query->where('name', 'like', "%{$params['keyword']}%"))
            ->when(data_get($params, 'parent_id'), fn($query) => $query->where('parent_id', $params['parent_id']))
            ->with(['parent:id,name'])
            ->withCount(['posts'])
            ->get();

        return Inertia::render('admin/categories/index', [
            'categories' => $categories
        ]);
    }

    public function create(): Response
    {
        $allCategories = Category::select('id', 'name')->get();

        return Inertia::render('admin/categories/create', [
            'allCategories' => $allCategories
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        try {
            Category::create($validated);
            return redirect()->route('admin.categories.index')->with('success', 'Tạo danh mục thành công');
        } catch (Throwable $throwable) {
            return back()->with('error', 'Tạo danh mục thất bại');
        }
    }

    public function show(Category $category): Response
    {
        return Inertia::render('admin/categories/edit', [
            'category' => $category,
            'allCategories' => Category::getAll()
        ]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        try {
            $category->update($validated);
            return back()->with('success', 'Cập nhật danh mục thành công');
        } catch (Throwable $throwable) {
            return back()->with('error', 'Cập nhật danh mục thất bại');
        }
    }

    public function destroy(Category $category): RedirectResponse
    {
        try {
            $category->delete();
            return back()->with('success', 'Xoá danh mục thành công');
        } catch (Throwable $throwable) {
            return back()->with('error', 'Xoá danh mục thất bại');
        }
    }
}
