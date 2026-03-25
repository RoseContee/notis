<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Show;
use App\Models\MediaCategory;
use App\Models\Contribute;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($media_category_id)
    {
        $shows = Show::where('media_category_id', $media_category_id)->get();
        $media_category = MediaCategory::find($media_category_id);
        return view('admin.show.index', compact('shows', 'media_category'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($media_category_id)
    {
        $genres = Genre::get();
        $media_category = MediaCategory::find($media_category_id);
        return view('admin.show.create', compact('genres', 'media_category'));
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
            'media_category_id' => 'required',
        ]);
        $status = Auth::user()->hasRole(['admin', 'super_admin']) ? 1 : 0;
        $show = Show::create(['title' => $request->title, 'media_category_id' => $request->media_category_id, 'date_sort' => $request->date_sort, 'description' => $request->description, 'status' => $status, 'adult' => $request->adult, 'user_id' => Auth::id() ]);
        $show->genres()->sync($request->genres);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $show->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $show->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        return redirect(route('shows.all'))->with('success','Tv Show added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin.show.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Show $show)
    {
        $genres = Genre::get();
        return view('admin.show.edit', compact('show', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Show $show)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $show->genres()->sync($request->genres);
        $show->update(['title' => $request->title, 'date_sort' => $request->date_sort,'top_scroll' => $request->top_scroll, 'description' => $request->description, 'status' => $request->status, 'adult' => $request->adult, 'best_serial' => $request->best_serial]);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $show->clearMediaCollection('thumbnail');
            $show->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $show->clearMediaCollection('poster');
            $show->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        if($request->hasFile('top_scroll_poster') && $request->file('top_scroll_poster')->isValid()){
            $show->clearMediaCollection('top_scroll_poster');
            $show->addMediaFromRequest('top_scroll_poster')->toMediaCollection('top_scroll_poster');
        }
        return redirect()->back()->with('success','Tv Show updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Show $show)
    {
        $show->clearMediaCollection('thumbnail');
        $show->clearMediaCollection('poster');
        $show->delete();
        return redirect()->back()->with('success','Tv Show deleted Successfully');
    }



    public function season_index($media_category_id)
    {
        $media_category = MediaCategory::find($media_category_id);
        $shows = Show::select('id')->where('media_category_id', $media_category_id)->get();
        $seasons = Season::whereIn('show_id', $shows)->get();
        return view('admin.show.season_index', compact('seasons', 'media_category'));
    }
    public function season_create($media_category_id)
    {
        $media_category = MediaCategory::find($media_category_id);
        $shows = Show::where('media_category_id', $media_category_id)->get();
        return view('admin.show.season_create', compact('shows'));
    }
    public function season_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required',
            'trailer' => 'required',
            'show_id' => 'required',
        ]);
        $status = Auth::user()->hasRole(['admin', 'super_admin']) ? 1 : 0;
        $season = Season::create(['title' => $request->title, 'date_sort' => $request->date_sort, 'description' => $request->description, 'status' => $status, 'adult' => $request->adult, 'year' => $request->year, 'trailer' => $request->trailer, 'show_id' => $request->show_id, 'user_id' => Auth::id() ]);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $season->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $season->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        if($request->hasFile('trailer_video') && $request->file('trailer_video')->isValid()){
            $season->addMediaFromRequest('trailer_video')->toMediaCollection('trailer_video');
        }
        return redirect()->back()->with('success','Season added Successfully');
    }
    public function season_edit(Season $season)
    {
        $media_category_id = $season->show->media_category->id;
        $shows = Show::where('media_category_id', $media_category_id)->get();
        return view('admin.show.season_edit', compact('season', 'shows'));
    }
    public function season_update(Request $request, Season $season)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required',
            'trailer' => 'required',
            'show_id' => 'required',
        ]);
        $season->update(['title' => $request->title, 'date_sort' => $request->date_sort, 'description' => $request->description, 'status' => $request->status, 'adult' => $request->adult, 'year' => $request->year, 'trailer' => $request->trailer, 'show_id' => $request->show_id ]);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $season->clearMediaCollection('thumbnail');
            $season->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $season->clearMediaCollection('poster');
            $season->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        if($request->hasFile('trailer_video') && $request->file('trailer_video')->isValid()){
            $season->clearMediaCollection('trailer_video');
            $season->addMediaFromRequest('trailer_video')->toMediaCollection('trailer_video');
        }
        return redirect()->back()->with('success','Season updated Successfully');
    }
    public function season_destroy(Season $season)
    {
        $season->clearMediaCollection('thumbnail');
        $season->clearMediaCollection('poster');
        $season->delete();
        return redirect()->back()->with('success','Season deleted Successfully');
    }



    public function episode_index($media_category_id)
    {
        $media_category = MediaCategory::find($media_category_id);
        $shows = Show::select('id')->where('media_category_id', $media_category_id)->get();
        $seasons = Season::select('id')->whereIn('show_id', $shows)->get();
        $episodes = Episode::whereIn('season_id', $seasons)->get();
        return view('admin.show.episode_index', compact('episodes', 'media_category'));
    }
    public function episode_create($media_category_id)
    {
        $media_category = MediaCategory::find($media_category_id);
        $shows = Show::select('id')->where('media_category_id', $media_category_id)->get();
        $seasons = Season::whereIn('show_id', $shows)->get();
        $contributes = Contribute::get();
        return view('admin.show.episode_create', compact('seasons', 'contributes'));
    }
    public function episode_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'season_id' => 'required',
        ]);
        $status = Auth::user()->hasRole(['admin', 'super_admin']) ? 1 : 0;
        $episode = Episode::create([
            'title' => $request->title, 
            'date_sort' => $request->date_sort, 
            'description' => $request->description, 
            'duration' => $request->duration, 
            'status' => $status, 
            'adult' => $request->adult,  
            'trailer' => $request->trailer, 
            'season_id' => $request->season_id, 
            'user_id' => Auth::id(), 
            'episode_file_type' => $request->episode_file_type, 
            'episode_link' => $request->episode_link,
            'contribute_id' => $request->contribute_id
        ]);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $episode->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $episode->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        if($request->hasFile('episode') && $request->file('episode')->isValid()){
            $episode->addMediaFromRequest('episode')->toMediaCollection('episode');
        }
        return redirect()->back()->with('success','Episode added Successfully');
    }
    public function episode_edit(Episode $episode)
    {
        $media_category_id = $episode->season->show->media_category->id;
        $shows = Show::select('id')->where('media_category_id', $media_category_id)->get();
        $seasons = Season::whereIn('show_id', $shows)->get();
        $contributes = Contribute::get();
        return view('admin.show.episode_edit', compact('episode', 'seasons', 'contributes'));
    }
    public function episode_update(Request $request, Episode $episode)
    {
        $request->validate([
            'title' => 'required',
            'duration' => 'required',
            'trailer' => 'required',
            'date_sort' => 'required',
            'description' => 'required',
            'adult' => 'required',
            'season_id' => 'required',
            'episode_link' => 'required_if:episode_file_type,link,external_link'
        ]);
        $episode->update([
            'title' => $request->title, 
            'date_sort' => $request->date_sort, 
            'description' => $request->description, 
            'duration' => $request->duration, 
            'status' => $request->status, 
            'adult' => $request->adult, 
            'trailer' => $request->trailer, 
            'season_id' => $request->season_id, 
            'episode_file_type' => $request->episode_file_type, 
            'episode_link' => $request->episode_link,
            'contribute_id' => $request->contribute_id
        ]);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $episode->clearMediaCollection('thumbnail');
            $episode->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $episode->clearMediaCollection('poster');
            $episode->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        if($request->hasFile('episode') && $request->file('episode')->isValid()){
            $episode->clearMediaCollection('episode');
            $episode->addMediaFromRequest('episode')->toMediaCollection('episode');
        }
        return redirect()->back()->with('success','Episode updated Successfully');
    }
    public function episode_destroy(Episode $episode)
    {
        $episode->clearMediaCollection('thumbnail');
        $episode->clearMediaCollection('poster');
        $episode->clearMediaCollection('episode');
        $episode->delete();
        return redirect(route('episodes.all'))->with('success','Episode deleted Successfully');
    }
}
