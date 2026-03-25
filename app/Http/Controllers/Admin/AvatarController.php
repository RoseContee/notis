<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Avatar;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $avatars = Avatar::get();
        return view('admin.avatar.index',compact('avatars'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.avatar.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'avatar' => 'required|image',
        ]);

        // Get the uploaded file
        $file = $request->file('avatar');

        // Generate a unique file name
        $fileName = uniqid('avatar_') . '.' . $file->getClientOriginalExtension();

        // Save the file to the public avatars folder
        $file->move(public_path('avatars'), $fileName);

        // Create a new avatar model and save the file path to it
        $avatar = new Avatar();
        $avatar->avatar_path =  $fileName;
        $avatar->is_default =  $request->is_default;
        $avatar->save();

        // Redirect back to the form with a success message
        return redirect()->back()->with('success','Avatar uploaded Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin.avatar.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin.avatar.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Avatar $avatar)
    {
        // Get the file path for the avatar
        $filePath = public_path('avatars/'.$avatar->avatar_path);

        // Delete the file from disk
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $avatar->delete();
        return redirect(route('avatars.all'))->with('success', 'Avatar Deleted Successfully');
    }
}
