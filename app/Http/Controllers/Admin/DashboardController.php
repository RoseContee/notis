<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $affiliations=[];
        $referals=[];
        if(!$user->hasRole('super_admin') && !$user->hasRole('admin')){
            $affiliations = User::where('ref_by', $user->id)->where('ref_by', '!=','')->get();
            $referals = User::where('ref_by',$user->id)->get();
        }
        if($user->hasRole('super_admin') || $user->hasRole('admin')){
            $users = count(User::whereHas('roles', function ($query) {
                return $query->where('name','!=', 'user');
            })->get());
            $subscriptions = Subscription::all();
        }else{
            $users = [];
            $subscriptions = [];
        }
        return view('admin.dashboard.index', compact('affiliations', 'referals', 'users', 'subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::edit');
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
    public function destroy($id)
    {
        //
    }
}
