<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\MediaCategory;

class MediaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $media_category_list = MediaCategory::get();
        return view('admin.media_category.index', compact('media_category_list'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.media_category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:media_categories',
        ]);
        MediaCategory::create($request->except('_token'));
        return redirect(route('media_categories.all'))->with('success','Media Category added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(MediaCategory $media_category)
    {
        return view('admin.media_category.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(MediaCategory $media_category)
    {
        return view('admin.media_category.edit', compact('media_category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, MediaCategory $media_category)
    {
        $request->validate([
            'name' => 'required|unique:media_categories,name,'.$media_category->id,
        ]);
        $media_category->update($request->except('_token'));
        return redirect(route('media_categories.all'))->with('success','Media Category added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(MediaCategory $media_category)
    {
        $media_category->delete();
        return redirect(route('media_categories.all'))->with('success', 'Media Category Deleted Successfully');
    }
}
