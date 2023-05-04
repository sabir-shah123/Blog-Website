<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function list() {
        $page_title = 'Categories';
        $categories = Category::latest()->get();
        return view('backend.category.list', compact('page_title', 'categories'));
    }

    public function add()
    {
        $page_title = 'Create Category';
        $categories = Category::latest()->get();
        return view('backend.category.add', compact('page_title', 'categories'));
    }

    public function edit($id)
    {
        $page_title = 'Edit Category';
        $categories = Category::where('id', '!=', $id)->latest()->get();
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('page_title', 'category', 'categories'));
    }

    public function save(Request $request, $id = null)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $slug = Str::slug($request->name);
        if (Category::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return redirect()->back()->with('error', 'Please try with some different name');
        }

        $category = Category::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'slug' => $slug,
                'parent_id' => $request->parent_id ?? null,
                'image' => $request->image ? uploadFile($request->image, 'uploads/category', 'category_' . time()) : null,
            ]
        );
        return redirect()->route('backend.category.list')->with('success', 'Category saved successfully');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function status($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
        return redirect()->back()->with('success', 'Category status updated successfully');
    }

}
