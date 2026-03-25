<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Network;
use Auth;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $network = Network::where('user_id', Auth::user()->id)->first();
        return view('admin.network.index', compact('network'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function list()
    {
        $network_list = Network::select('*')->get();
        return view('admin.network.list', compact('network_list'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $network = Network::where('user_id', Auth::user()->id)->first();

        $request->validate([
            'name'          => 'required',
            'logo'          => 'required'
        ]);

        if(isset($network)) {
            $network->update([
                'name'      => $request->name,
                'user_id'   => Auth::user()->id,
                'status'    => 0
            ]);
        } else {
            $network = Network::create([
                'name'      => $request->name,
                'user_id'   => Auth::user()->id,
                'status'    => 0
            ]);
        }

        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $network->clearMediaCollection('logo');
            $network->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        return redirect(route('network.index'))->with('success','Network Setted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Network $network)
    {
        return view('admin.network.edit', compact('network'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Network $network)
    {
        $request->validate([
            'status'    => 'required'
        ]);
        
        $network->update([
            'status' => $request->status
        ]);
        return redirect(route('network.all'))->with('success','Network Status Changed Successfully');
    }
}
