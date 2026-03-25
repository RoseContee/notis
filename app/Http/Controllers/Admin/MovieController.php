<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MediaCategory;
use App\Models\Contribute;
use App\Models\User;
use Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($media_category_id)
    {
        $movies = Movie::where('media_category_id', $media_category_id)->orderBy('date_sort', 'desc')->get();
        $media_category = MediaCategory::find($media_category_id);
        return view('admin.movie.index', compact('movies', 'media_category'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($media_category_id)
    {
        $genres = Genre::get();
        $media_category = MediaCategory::find($media_category_id);
        $users = Contribute::select('user_id')->distinct()->get();
        $contributes = User::whereIn('id', $users)->get();
        return view('admin.movie.create', compact('genres', 'media_category', 'contributes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:movies',
            'media_category_id' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'access' => 'required',
            'trailer' => 'required',
            'date_sort' => 'required',
            'description' => 'required',
            'genres' => 'required',
            'adult' => 'required',
            'movie_link' => 'required_if:movie_file_type,link,external_link',
            'movie' => 'required_if:movie_file_type,local'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }

        
        $status = Auth::user()->hasRole(['admin', 'super_admin']) ? 1 : 0;
        $movie = Movie::create([
            'title' => $request->title, 
            'media_category_id' => $request->media_category_id, 
            'year' => $request->year, 
            'duration' => $request->duration, 
            'access' => $request->access, 
            'trailer' => $request->trailer, 
            'date_sort' => $request->date_sort, 
            'description' => $request->description, 
            'status' => $status, 
            'number_of_video_ads' => $request->number_of_video_ads, 
            'adult' => $request->adult, 
            'user_id' => Auth::id(), 
            'movie_file_type' => $request->movie_file_type, 
            'movie_link' => $request->movie_link,
            'contribute_id' => $request->contribute_id
        ]);
        $movie->genres()->sync($request->genres);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $movie->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $movie->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        if($request->hasFile('movie') && $request->file('movie')->isValid()){
            $movie->addMediaFromRequest('movie')->toMediaCollection('movie');
        }
        if($request->hasFile('trailer_video') && $request->file('trailer_video')->isValid()){
            $movie->addMediaFromRequest('trailer_video')->toMediaCollection('trailer_video');
        }
        return redirect()->back()->with('success','Movie added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin.movie.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::get();
        $users = Contribute::select('user_id')->distinct()->get();
        $contributes = User::whereIn('id', $users)->get();
        return view('admin.movie.edit', compact('movie', 'genres', 'contributes'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'access' => 'required',
            'trailer' => 'required',
            'date_sort' => 'required',
            'description' => 'required',
            'genres' => 'required',
            'adult' => 'required',
            'movie_link' => 'required_if:movie_file_type,link,external_link'
        ]);
        $movie->genres()->sync($request->genres);

        $movie->update([
            'title' => $request->title, 
            'year' => $request->year, 
            'duration' => $request->duration, 
            'access' => $request->access, 
            'trailer' => $request->trailer, 
            'date_sort' => $request->date_sort, 
            'description' => $request->description,
            'top_scroll' => $request->top_scroll, 
            'new_release' => $request->new_release, 
            'upcoming' => $request->upcoming, 
            'status' => $request->status, 
            'adult' => $request->adult, 
            'number_of_video_ads' => $request->number_of_video_ads, 
            'movie_file_type' => $request->movie_file_type, 
            'movie_link' => $request->movie_link,
            'contribute_id' => $request->contribute_id
        ]);
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $movie->clearMediaCollection('thumbnail');
            $movie->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
        if($request->hasFile('poster') && $request->file('poster')->isValid()){
            $movie->clearMediaCollection('poster');
            $movie->addMediaFromRequest('poster')->toMediaCollection('poster');
        }
        if($request->hasFile('movie') && $request->file('movie')->isValid()){
            $movie->clearMediaCollection('movie');
            $movie->addMediaFromRequest('movie')->toMediaCollection('movie');
        }
        if($request->hasFile('top_scroll_poster') && $request->file('top_scroll_poster')->isValid()){
            $movie->clearMediaCollection('top_scroll_poster');
            $movie->addMediaFromRequest('top_scroll_poster')->toMediaCollection('top_scroll_poster');
        }
        if($request->hasFile('trailer_video') && $request->file('trailer_video')->isValid()){
            $movie->clearMediaCollection('trailer_video');
            $movie->addMediaFromRequest('trailer_video')->toMediaCollection('trailer_video');
        }
        return redirect()->back()->with('success','Movie updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Movie $movie)
    {
        $movie->clearMediaCollection('thumbnail');
        $movie->clearMediaCollection('poster');
        $movie->clearMediaCollection('movie');
        $movie->clearMediaCollection('top_scroll_poster');
        $movie->delete();
        return redirect()->back()->with('success', 'Movie Deleted Successfully');
    }
}
