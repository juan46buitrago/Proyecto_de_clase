<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|min:2|max:100',
            'description' => 'required|min:5|max:500',
        ]);

        Category::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.index');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|min:2|max:100',
            'description' => 'required|min:5|max:500',
        ]);

        $category->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.index');
    }
}
