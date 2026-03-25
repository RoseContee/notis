<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Room;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $rooms = Room::get();
        return view('admin.rental.rooms_index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.rental.rooms_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $room = Room::create($request->except('_token', 'gallery'));
        if ($request->hasFile('gallery')) {
            $room->addMultipleMediaFromRequest(['gallery'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('gallery');
            });
        }
        return redirect(route('rooms.all'))->with('success', 'Room Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin.rental.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Room $room)
    {
        return view('admin.rental.room_edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Room $room)
    {
        $room->update($request->except('_token', 'gallery'));
        if ($request->hasFile('gallery')) {
            $room->clearMediaCollection('gallery');
            $room->addMultipleMediaFromRequest(['gallery'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('gallery');
            });
        }
        return redirect(route('rooms.all'))->with('success', 'Room Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Room $room)
    {
        $room->clearMediaCollection('gallery');
        $room->delete();
        return redirect(route('rooms.all'))->with('success', 'Room Deleted Successfully');
    }


    public function equipment_index()
    {
        $equipments = Equipment::get();
        return view('admin.rental.equipment_index',compact('equipments'));
    }
    public function equipment_create()
    {
        $categories = Category::where('parent_cat','!=',null)->get();
        return view('admin.rental.equipment_create', compact('categories'));
    }
    public function equipment_store(Request $request)
    {
        $equipment = Equipment::create($request->except('_token', 'gallery'));
        if ($request->hasFile('gallery')) {
            $equipment->addMultipleMediaFromRequest(['gallery'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('gallery');
            });
        }
        return redirect(route('equipments.all'))->with('success', 'Equipment Added Successfully');
    }
    public function equipment_edit(Equipment $equipment)
    {
        $categories = Category::where('parent_cat','!=',null)->get();
        return view('admin.rental.equipment_edit', compact('equipment', 'categories'));
    }
    public function equipment_update(Request $request, Equipment $equipment)
    {
        $equipment->update($request->except('_token', 'gallery'));
        if ($request->hasFile('gallery')) {
            $equipment->clearMediaCollection('gallery');
            $equipment->addMultipleMediaFromRequest(['gallery'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('gallery');
            });
        }
        return redirect(route('equipments.all'))->with('success', 'Equipment Updated Successfully');
    }
    public function equipment_destroy(Equipment $equipment)
    {
        $equipment->clearMediaCollection('gallery');
        $equipment->delete();
        return redirect(route('equipments.all'))->with('success', 'Equipment Deleted Successfully');
    }
}
