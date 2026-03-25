<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Advertisement;
use App\Models\Avatar;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Profile;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Show;

class ApiController extends Controller
{
    public function search($search){
        $movies = Movie::where('title','like','%'.$search.'%')->get()->map(function ($movie) {
            $movie->poster = $movie->getFirstMediaUrl('poster');
            $movie->thumbnail = $movie->getFirstMediaUrl('thumbnail');
            $movie->trailer_video = $movie->getFirstMediaUrl('trailer_video');
            return $movie;
        });
        $shows = Show::where('title','like','%'.$search.'%')->get()->map(function ($show) {
            $show->poster = $show->getFirstMediaUrl('poster');
            $show->thumbnail = $show->getFirstMediaUrl('thumbnail');
            $show->trailer = $show->seasons()->first()->getFirstMediaUrl('trailer_video');
            return $show;
        });

        return ['movies' => $movies, 'shows' => $shows];
    }

    public function home_content(){
        $slider = Movie::where('top_scroll',1)->orderBy('date_sort', 'desc')->get()->map(function ($movie) {
            $movie->poster = $movie->getFirstMediaUrl('poster');
            $movie->thumbnail = $movie->getFirstMediaUrl('thumbnail');
            $movie->trailer_video = $movie->getFirstMediaUrl('trailer_video');
            $movie->tv_show = false;
            return $movie;
        });
        $slider_shows = Show::where('top_scroll',1)->orderBy('date_sort', 'desc')->get()->map(function ($show) {
            $show->poster = $show->getFirstMediaUrl('poster');
            $show->thumbnail = $show->getFirstMediaUrl('thumbnail');
            $show->tv_show = true;
            $show->trailer = $show->seasons()->first()->getFirstMediaUrl('trailer_video');
            return $show;
        });
        $new_release = Movie::where('new_release',1)->get()->map(function ($movie) {
            $movie->poster = $movie->getFirstMediaUrl('poster');
            $movie->thumbnail = $movie->getFirstMediaUrl('thumbnail');
            $movie->trailer_video = $movie->getFirstMediaUrl('trailer_video');
            return $movie;
        });
        $upcoming = Movie::where('upcoming',1)->get()->map(function ($movie) {
            $movie->poster = $movie->getFirstMediaUrl('poster');
            $movie->thumbnail = $movie->getFirstMediaUrl('thumbnail');
            $movie->trailer_video = $movie->getFirstMediaUrl('trailer_video');
            return $movie;
        });
        $best_serials = Show::where('best_serial',1)->get()->map(function ($show) {
            $show->poster = $show->getFirstMediaUrl('poster');
            $show->thumbnail = $show->getFirstMediaUrl('thumbnail');
            $show->trailer = $show->seasons()->first()->getFirstMediaUrl('trailer_video');
            return $show;
        });

        return ['slider' => $slider, 'slider_shows' => $slider_shows, 'content' => ['new_release' => $new_release, 'featured' => $upcoming, 'best_serials' => $best_serials]];
    }

    public function new_profile($userid){
        $user = User::find($userid);
        if ($user->profiles()->count() >= 5){
            $data['code'] = 404;
            $data['message'] = 'Maximum Profile Reached';
        }else{
            $count = $user->profiles()->count() + 1;
            $profile = $user->profiles()->create(['name' => 'Profile '.$count]);

            $data['code'] = 200;
            $data['profile'] = $profile;
        }

        return $data;
    }

    public function account_edit_post(Request $request){
        $profile_id = $request->profile_id;
        $profile = Profile::find($profile_id);
        $profile->update(['name' => $request->name, 'country' => $request->country, 'city' => $request->city, 'gender' => $request->gender, 'zipcode' => $request->zipcode, 'age' => $request->age, 'avatar_id' => $request->avatar_id ]);

        return $profile;
    }

    public function profile_data(Profile $profile){
        return $profile;
    }

    public function detail_movie($id){

    }

    public function genres(){
        return Genre::get();
    }
    public function shows(){
        return Show::get()->map(function ($show) {
            $show->poster = $show->getFirstMediaUrl('poster');
            $show->thumbnail = $show->getFirstMediaUrl('thumbnail');
            $show->trailer = $show->seasons()->first()->getFirstMediaUrl('trailer_video');
            return $show;
        });
    }
    public function movies(){
        return Movie::get()->map(function ($movie) {
            $movie->poster = $movie->getFirstMediaUrl('poster');
            $movie->thumbnail = $movie->getFirstMediaUrl('thumbnail');
            $movie->trailer_video = $movie->getFirstMediaUrl('trailer_video');
            return $movie;
        });
    }
    public function shows_by_genre(Genre $genre){
        $shows = $genre->shows;
        // Map through each episode and add the URL attribute
        return $shows->map(function ($show) {
            $show->poster = $show->getFirstMediaUrl('poster');
            $show->thumbnail = $show->getFirstMediaUrl('thumbnail');
            // Return the modified episode object
            return $show;
        });
    }
    public function show_details(Show $show){
        $show['season_list'] = $show->seasons()->get()->map(function ($season) {
            $season->trailer_video = $season->getFirstMediaUrl('trailer_video');
            return $season;
        });
        $show['poster'] = $show->getFirstMediaUrl('poster');
        $show['thumbnail'] = $show->getFirstMediaUrl('thumbnail');
        return $show;
    }
    public function show_seasons(Show $show){
        return $show->seasons()->get()->map(function ($season) {
            $season->trailer_video = $season->getFirstMediaUrl('trailer_video');
            return $season;
        });
    }
    public function season_episodes(Season $season, User $user){
        // Get the episodes collection
        $episodes = $season->episodes;

        // Map through each episode and add the URL attribute
        return $episodes->map(function ($episode) use ($user) {
            // Generate the URL, customize this according to your needs
            if ($episode->episode_file_type == 'local'){
                $url =  $episode->getFirstMediaUrl('episode');
            }elseif ($episode->episode_file_type == 'link'){
                $url = url('/').'/Bz0Z1ff15KU/'. $episode->episode_link;
            }elseif ($episode->episode_file_type == 'external_link'){
                $url = $episode->episode_link;
            }
            $episode->url = $url;
            $episode->poster = $episode->getFirstMediaUrl('poster');
            $episode->thumbnail = $episode->getFirstMediaUrl('thumbnail');
            $episode->currentTime = $episode->watchTimes()->where('user_id', $user->id)->first() ? $episode->watchTimes()->where('user_id', $user->id)->first()->time : 0;
            // Return the modified episode object
            return $episode;
        });
    }

    public function movies_by_genre(Genre $genre){
        $movies = $genre->movies;
        // Map through each episode and add the URL attribute
        return $movies->map(function ($movie) {
            $movie->poster = $movie->getFirstMediaUrl('poster');
            $movie->thumbnail = $movie->getFirstMediaUrl('thumbnail');
            // Return the modified episode object
            return $movie;
        });
    }
    public function movie_details(Movie $movie){
        if ($movie->movie_file_type == 'local'){
            $url = $movie->getFirstMediaUrl('movie');
        }elseif ($movie->movie_file_type == 'link'){
            $url = url('/').'/Bz0Z1ff15KU/'.$movie->movie_link;
        }elseif ($movie->movie_file_type == 'external_link'){
            $url = $movie->movie_link;
        }
        $movie['url'] = $url;
        $movie['genres'] = $movie->genres;
        $movie['poster'] = $movie->getFirstMediaUrl('poster');
        $movie['thumbnail'] = $movie->getFirstMediaUrl('thumbnail');
        return $movie;
    }

    public function movie_currentTime(Request $request){
        $movie = Movie::find($request->movie_id);
        $profile_id = $request->profile_id;
        $user_id = $request->user_id;
        $profile_id = (int)$profile_id;
        $movie->watchTimes()->updateOrCreate(
            ['user_id' => $user_id, 'profile_id' => $profile_id],
            ['time' => $request->currentTime]
        );
        return ['success' => 'success'];
    }
    public function episode_currentTime(Request $request){
        $episode = Episode::find($request->episode_id);
        $profile_id = $request->profile_id;
        $user_id = $request->user_id;
        $profile_id = (int)$profile_id;
        $episode->watchTimes()->updateOrCreate(
            ['user_id' => $user_id, 'profile_id' => $profile_id],
            ['time' => $request->currentTime]
        );
        return ['success' => 'success'];
    }

    public function get_movie_time(Request $request){
        $movie = Movie::find($request->movie_id);
        $savedTime = $movie->watchTimes()->where('user_id', $request->user_id)->first();
        $savedTime = $savedTime->time ?? 0;
        if ($savedTime > 5){
            $savedTime  = $savedTime - 5;
        }
        if ($savedTime <= 0){
            $savedTime  = 0;
        }
        return ['savedTime' => $savedTime];
    }
    public function get_episode_time(Request $request){
        $episode = Episode::find($request->episode_id);
        $savedTime = $episode->watchTimes()->where('user_id', $request->user_id)->first();
        $savedTime = $savedTime->time ?? 0;
        if ($savedTime > 5){
            $savedTime  = $savedTime - 5;
        }
        if ($savedTime <= 0){
            $savedTime  = 0;
        }
        return ['savedTime' => $savedTime];
    }
    public function get_profiles(User $user){
        $profiles = $user->profiles;
        if ($profiles){
            $data['code'] = 200;
            // Map through each episode and add the URL attribute
            $data['profiles'] = $profiles->map(function ($profile) {

                if ($profile->avatar){
                    $path = $profile->avatar->avatar_path;
                }else{
                    $path = null;
                }
                $profile->avatar_path = url('/').'/avatars/'. $path;
                // Return the modified episode object
                return $profile;
            });

        }else{
            $data['code'] = 404;
            $data['message'] = 'User do not have profiles';
        }
        return $data;
    }

    public function get_icons(Request $request){
        $data['status_code'] = 200;
        $data['icons'] = Avatar::get();
        return $data;
    }

    public function get_advertisement_movie(Movie $movie){
        $ad_images = Advertisement::where('status', 1)->get();
        $images = [];
        $videos = [];
        foreach ($ad_images as $ad){
            $ad_movies = $ad->movies()->pluck('movies.id')->toArray();
            if ($ad->movies_type == 'include'){
                if(in_array($movie->id, $ad_movies)){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }elseif ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }elseif ($ad->movies_type == 'exclude'){
                if(!in_array($movie->id, $ad_movies)){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }elseif ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }else{
                if ($ad->type == 'image'){
                    $images[] = [
                        'id' => $ad->id,
                        'link' => $ad->getFirstMediaUrl('file'),
                    ];
                }elseif ($ad->type == 'video'){
                    $videos[] = [
                        'id' => $ad->id,
                        'link' => $ad->getFirstMediaUrl('file'),
                    ];
                }
            }
        }
//        $now = \Carbon\Carbon::now();
//        $noAdds = Auth::user()->p_subscriptions()->where('adds',0)->where('expire_at', '>', $now)->count()>0;
        $data['status_code'] = 200;
        $data['add_images'] = $images;
        $data['add_videos'] = $videos;
        $data['noAdds'] = false;

        return $data;
    }

    public function get_advertisement_episode(Episode $episode){
        $ad_images = Advertisement::where('status', 1)->get();
        $images = [];
        $videos = [];
        foreach ($ad_images as $ad){
            $ad_movies = $ad->episodes()->pluck('episodes.id')->toArray();
            if ($ad->movies_type == 'include'){
                if(in_array($episode->id, $ad_movies)){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }elseif ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }elseif ($ad->movies_type == 'exclude'){
                if(!in_array($episode->id, $ad_movies)){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }elseif ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }else{
                if ($ad->type == 'image'){
                    $images[] = [
                        'id' => $ad->id,
                        'link' => $ad->getFirstMediaUrl('file'),
                    ];
                }elseif ($ad->type == 'video'){
                    $videos[] = [
                        'id' => $ad->id,
                        'link' => $ad->getFirstMediaUrl('file'),
                    ];
                }
            }
        }
//        $now = \Carbon\Carbon::now();
//        $noAdds = Auth::user()->p_subscriptions()->where('adds',0)->where('expire_at', '>', $now)->count()>0;
        $data['status_code'] = 200;
        $data['add_images'] = $images;
        $data['add_videos'] = $videos;
        $data['noAdds'] = false;

        return $data;
    }
}
