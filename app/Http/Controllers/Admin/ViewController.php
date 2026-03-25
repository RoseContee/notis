<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Movie;
use App\Models\Profile;
use App\Models\Episode;
use App\Models\View;
use App\Models\AdsView;
use App\Models\Setting;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request){
        $views = new View();
        $req_data = $request->all();

        if ($request->isMethod('post')) {
//            if ($type == 'user'){
//                $views = $views->where('user_id', $id);
//            }
            if (isset($req_data['profile_id'])){
                $id = $req_data['profile_id'];
                $views = $views->where('profile_id', $id);
            }
            if (isset($req_data['movie_id'])){
                $id = $req_data['movie_id'];
                $views = $views->where('viewable_id', $id);
            }
            if (isset($req_data['gender'])){
                $id = $req_data['gender'];
                $views = $views->whereHas('profile', function ($query) use ($id) {
                    $query->where('gender', $id);
                });
            }
            if (isset($req_data['age'])){
                $id = $req_data['age'];
                $views = $views->whereHas('profile', function ($query) use ($id) {
                    $query->where('age', $id);
                });
            }
            if (isset($req_data['from']) && isset($req_data['to'])){
                $from= $req_data['from'];
                $to = $req_data['to'];
                $views = $views->whereBetween('created_at', [$from, $to]);
            }

        }
        $visit_profiles = View::where('profile_id', '!=', null)->where('viewable_type', 'App\Models\Movie')->pluck('profile_id')->unique()->toArray();
        $profiles = Profile::wherein('id', $visit_profiles)->get();

        $view_movies = View::where('viewable_id', '!=', null)->where('viewable_type', 'App\Models\Movie')->pluck('viewable_id')->unique()->toArray();
        $movies = Movie::wherein('id', $view_movies)->get();


        $views = $views->where('viewable_type', 'App\Models\Movie')->paginate(15);
        return view('admin.view.index', compact('views', 'profiles', 'movies', 'req_data'));
    }
    public function views_shows(Request $request){
        $views = new View();
        $req_data = $request->all();

        if ($request->isMethod('post')) {
//            if ($type == 'user'){
//                $views = $views->where('user_id', $id);
//            }
            if (isset($req_data['profile_id'])){
                $id = $req_data['profile_id'];
                $views = $views->where('profile_id', $id);
            }
            if (isset($req_data['episode_id'])){
                $id = $req_data['episode_id'];
                $views = $views->where('viewable_id', $id);
            }
            if (isset($req_data['gender'])){
                $id = $req_data['gender'];
                $views = $views->whereHas('profile', function ($query) use ($id) {
                    $query->where('gender', $id);
                });
            }
            if (isset($req_data['age'])){
                $id = $req_data['age'];
                $views = $views->whereHas('profile', function ($query) use ($id) {
                    $query->where('age', $id);
                });
            }
            if (isset($req_data['from']) && isset($req_data['to'])){
                $from= $req_data['from'];
                $to = $req_data['to'];
                $views = $views->whereBetween('created_at', [$from, $to]);
            }

        }

        $visit_profiles = View::where('profile_id', '!=', null)->where('viewable_type', 'App\Models\Movie')->pluck('profile_id')->unique()->toArray();
        $profiles = Profile::wherein('id', $visit_profiles)->get();

        $view_episodes = View::where('viewable_id', '!=', null)->where('viewable_type', 'App\Models\Episode')->pluck('viewable_id')->unique()->toArray();
        $episodes = Episode::wherein('id', $view_episodes)->get();
        $views = $views->where('viewable_type', 'App\Models\Episode')->paginate(15);

        return view('admin.view.views_shows', compact('views', 'profiles', 'episodes', 'req_data'));
    }

    public function views_ads(Request $request){
        $views = new AdsView();
        $views = $views->paginate(15);
        $setting = Setting::first();
        $ad_length = isset($setting->ad_length) ? explode(',', $setting->ad_length) : [];
        $ad_price = isset($setting->ad_price) ? explode(',', $setting->ad_price) : [];
        $ad_special_price = isset($setting->ad_special_price) ? explode(',', $setting->ad_special_price) : [];
        $ad_image_price = $setting->ad_image_price;

        return view('admin.view.views_ads', compact('views', 'ad_length', 'ad_price', 'ad_special_price', 'ad_image_price'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.view.create');
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
        return view('admin.view.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin.view.edit');
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

    public function analytics($type = null, $id = null){

        dd('aaa');

        $views = new View();
        if ($type == 'user'){
            $views = $views->where('user_id', $id);
        }
        if ($type == 'movie'){
            $views = $views->where('viewable_id', $id);
        }
        $from= null;
        $to_date = null;
        if ($type == 'date'){
            $from = $id;
            $to_date = $to;
            $views = $views->whereBetween('created_at', [$from, $to]);
        }
        $views = $views->where('viewable_type', 'App\Models\Movie')->paginate(15);
        return view('admin.view.index', compact('views', 'users', 'movies', 'id', 'from', 'to_date', 'type'));
    }
}
