<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Contribute;
use Auth;

class ContributeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $hasRole = Auth::user()->can('publish_contribute');
        
        if($hasRole)
            $contribute_list = Contribute::get();
        else
            $contribute_list = Contribute::where('user_id', Auth::user()->id)->get();
        return view('admin.contribute.index', compact('contribute_list', 'hasRole'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.contribute.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);

        $contribute = Contribute::create([
            'title' => $request->title,
            'description' => $request->description, 
            'link' => $request->link, 
            'user_id'   => Auth::user()->id
        ]);
        return redirect(route('contribute.all'))->with('success','Contribute video Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Contribute $contribute)
    {
        return view('admin.contribute.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Contribute $contribute)
    {
        return view('admin.contribute.edit', compact('contribute'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Contribute $contribute)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);
        
        $contribute->update([
            'title' => $request->title,
            'description' => $request->description, 
            'link' => $request->link
        ]);
        return redirect(route('contribute.all'))->with('success','Contribute Video Changed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Contribute $contribute)
    {
        $contribute->delete();
        return redirect(route('contribute.all'))->with('success', 'Contribute Video Deleted Successfully');
    }
}
