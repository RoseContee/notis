<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Advertisement;
use App\Models\Movie;
use App\Models\Show;
use App\Models\Season;
use App\Models\Episode;
use App\Models\Setting;
use Auth;
use Validator;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $hasRole = Auth::user()->can('publish_advertisement');
        
        if($hasRole)
            $advertisements = Advertisement::get();
        else
            $advertisements = Advertisement::where('user_id', Auth::user()->id)->get();
        $setting = Setting::first();
        $ad_length = isset($setting->ad_length) ? explode(',', $setting->ad_length) : [];
        $ad_price = isset($setting->ad_price) ? explode(',', $setting->ad_price) : [];
        $ad_special_price = isset($setting->ad_special_price) ? explode(',', $setting->ad_special_price) : [];
        $ad_image_price = $setting->ad_image_price;
        return view('admin.advertisement.index', compact('advertisements', 'ad_length', 'ad_price', 'ad_special_price', 'ad_image_price'));
    }

    public function deposit()
    {
        $setting = Setting::first();
        return view('admin.advertisement.deposit', compact('setting'));
    }

    public function postDeposit(Request $request)
    {
        $user = Auth::user();

        if(!$user->hasPaymentMethod())
            return back()->withErrors(['message' => 'Please set payment method.']);

        $paymentMethod = $user->defaultPaymentMethod()->asStripePaymentMethod();

        if(isset($paymentMethod))
            return back()->withErrors(['message' => 'Please set payment method.']);

        $cost = $request->cost;
        
        $user->charge($cost, $paymentMethod->id);
        $user->a_cash += $cost;
        $user->save();
        
        return back()->with('success', 'Charge Successfully');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $movies = Movie::orderBy('date_sort', 'desc')->get();
        $shows = Show::orderBy('date_sort', 'desc')->get();
        $seasons = Season::orderBy('date_sort', 'desc')->get();
        $setting = Setting::first();
        $ad_length = isset($setting->ad_length) ? explode(',', $setting->ad_length) : [];
        $ad_price = isset($setting->ad_price) ? explode(',', $setting->ad_price) : [];
        $ad_special_price = isset($setting->ad_special_price) ? explode(',', $setting->ad_special_price) : [];
        $ad_image_price = $setting->ad_image_price;
        return view('admin.advertisement.create', compact('movies', 'shows', 'ad_length', 'ad_price', 'ad_special_price', 'ad_image_price'));
    }

    public function getSeasonsByShow(Request $request)
    {
        $id = $request->id;
        $seasons = Season::where('show_id', $id)->
                    orderBy('date_sort', 'desc')->get();

        return response($seasons);
    }

    public function getEpisodeBySeason(Request $request)
    {
        $id = $request->id;
        $episodes = Episode::where('season_id', $id)->
                    orderBy('date_sort', 'desc')->get();

        return response($episodes);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'file' => 'required',
            'ad_length' => 'required_if:type,video',
            'target_url' => 'required_if:use_target,1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }
        $advertisement = Advertisement::create([
            'name' => $request->name,
            'type' => $request->type, 
            'status' => isset($request->status) ? $request->status : 0, 
            'movies_type' => $request->movies_type, 
            'use_target' => $request->use_target, 
            'target_url'    => $request->use_target && isset($request->target_url) ? $request->target_url : null,
            'ad_length' => $request->use_target == 0 ? $request->ad_length : $request->ad_length_spec, 
            // 'ppv' => $request->ppv,
            'user_id'   => Auth::user()->id
        ]);
        $advertisement->movies()->sync($request->movies);
        $advertisement->seasons()->sync($request->season);
        $advertisement->episodes()->sync($request->episodes);
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $advertisement->addMediaFromRequest('file')->toMediaCollection('file');
        }
        return redirect(route('advertisements.all'))->with('success','Advertisement added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin.advertisement.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Advertisement $advertisement)
    {
        $movies = Movie::orderBy('date_sort', 'desc')->get();
        $shows = Show::orderBy('date_sort', 'desc')->get();
        $seasonList = $advertisement->seasons()->pluck('seasons.id')->toArray();

        $seasons = [];
        $episodes = [];
        $selected_season = -1;
        $selected_show = -1;
        if(count($seasonList) > 0) {
            $selected_season = $seasonList[0];
            $season = Season::find($selected_season);
            $selected_show = $season->show_id;

            $seasons = Season::where('show_id', $selected_show)
                            ->orderBy('date_sort', 'desc')->get();
            $episodes = Episode::where('season_id', $selected_season)
                            ->orderBy('date_sort', 'desc')->get();
        }

        
        $setting = Setting::first();
        $ad_length = isset($setting->ad_length) ? explode(',', $setting->ad_length) : [];
        $ad_price = isset($setting->ad_price) ? explode(',', $setting->ad_price) : [];
        $ad_special_price = isset($setting->ad_special_price) ? explode(',', $setting->ad_special_price) : [];
        $ad_image_price = $setting->ad_image_price;
        return view('admin.advertisement.edit', compact('advertisement', 'movies', 'shows', 'seasons', 'selected_show', 'selected_season', 'episodes', 'ad_length', 'ad_price', 'ad_special_price', 'ad_image_price'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $hasRole = Auth::user()->can('publish_advertisement');
        
        $advertisement->seasons()->sync($request->season == -1 ? null : $request->season);
        $advertisement->movies()->sync($request->movies);
        $advertisement->episodes()->sync($request->episodes);

        if($advertisement->status == 0 || $hasRole) {
            $status = 0;

            if(!$hasRole && $request->status != 0)
                $status = 0;
            else
                $status = $request->status ? $request->status : 0;

            $advertisement->update([
                'name' => $request->name, 
                // 'type' => $request->type, 
                'status' => $status, 
                'movies_type' => $request->movies_type, 
                'use_target' => $request->use_target, 
                'target_url'    => $request->use_target && isset($request->target_url) ? $request->target_url : null,
                'ad_length' => $request->use_target == 0 ? $request->ad_length : $request->ad_length_spec,
                // 'ppv' => $request->ppv
            ]);
        } else {
            $advertisement->status = $request->status;
            $advertisement->save();
        }
            
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $advertisement->clearMediaCollection('file');
            $advertisement->addMediaFromRequest('file')->toMediaCollection('file');
        }
        return redirect(route('advertisements.all'))->with('success','Advertisement Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->clearMediaCollection('file');
        $advertisement->delete();
        return redirect(route('advertisements.all'))->with('success','Advertisement Deleted Successfully');
    }
}
