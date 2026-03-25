<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::where('parent_cat','!=',null)->get();
        return view('admin.category.index', compact('categories'));
    }
    public function top_index()
    {
        $categories = Category::where('parent_cat',null)->get();
        return view('admin.category.top_index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $top_categories = Category::where('parent_cat',null)->get();
        return view('admin.category.create', compact('top_categories'));
    }
    public function top_create()
    {
        return view('admin.category.top_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $category = Category::create($request->except('_token', 'picture'));
        if($request->hasFile('picture') && $request->file('picture')->isValid()){
            $category->addMediaFromRequest('picture')->toMediaCollection('picture');
        }
        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Category $category)
    {
        $top_categories = Category::where('parent_cat',null)->get();
        return view('admin.category.edit', compact('top_categories', 'category'));
    }
    public function top_edit(Category $category)
    {
        return view('admin.category.top_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('_token', 'picture'));
        if($request->hasFile('picture') && $request->file('picture')->isValid()){
            $category->clearMediaCollection('picture');
            $category->addMediaFromRequest('picture')->toMediaCollection('picture');
        }
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
    // public function categories()
    // {   
    //     $categories = Category::all();
    //     return view('layouts.backend',compact('categories'));
    // }
}
