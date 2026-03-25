<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Visit;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($type = null, $id = null, $to = null){


        $visit_users = Visit::where('user_id', '!=', null)->pluck('user_id')->unique()->toArray();
        $users = User::wherein('id', $visit_users)->get();

        $browsers = Visit::where('browser', '!=', null)->pluck('browser')->unique()->toArray();
        $devices = Visit::where('browser', '!=', null)->pluck('device')->unique()->toArray();


        $visits = new Visit;
        if ($type == 'user'){
            $visits = $visits->where('user_id', $id);
        }
        if ($type == 'device'){
            $visits = $visits->where('device', $id);
        }
        if ($type == 'browser'){
            $visits = $visits->where('browser', $id);
        }
        $from= null;
        $to_date = null;
        if ($type == 'date'){
            $from = $id;
            $to_date = $to;
            $visits = $visits->whereBetween('created_at', [$from, $to]);
        }
        $visits = $visits->paginate(15);
        return view('admin.visit.index', compact('visits', 'users', 'browsers', 'devices', 'id', 'from', 'to_date', 'type'));
    }
    public function visits_graph(Request $request){

        $date = Carbon::now()->subDays(30);
        $countries = Visit::where('created_at', '>=', $date)->where('location' , '!=', null)->where('location','!=', '0')->pluck('location')->unique();
        $devices = Visit::where('created_at', '>=', $date)->where('device' , '!=', null)->where('device','!=', '0')->pluck('device')->unique();
        $browsers = Visit::where('created_at', '>=', $date)->where('browser' , '!=', null)->where('browser','!=', '0')->pluck('browser')->unique();

        $from= null;
        $to = null;
        if ($request->from){
            $from = explode('-',$request->from);
            $to = explode('-',$request->to);
        }

        return view('admin.visit.visits_graph', compact('countries', 'devices', 'browsers', 'from', 'to'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.visit.create');
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
        return view('admin.visit.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin.visit.edit');
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
