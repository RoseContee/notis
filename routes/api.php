<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [UserController::class, 'login']);
Route::post('signup', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('user-details', [UserController::class, 'userDetails']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_profiles/{user}', [App\Http\Controllers\ApiController::class, 'get_profiles']);

Route::post('stripe/webhook', [App\Http\Controllers\HomeController::class, 'handleStripeWebhook']);
Route::post('paypal/webhooks', [App\Http\Controllers\HomeController::class, 'handlePaypalWebhook']);

Route::get('profile_data/{profile}', [App\Http\Controllers\ApiController::class, 'profile_data']);
Route::get('new_profile/{user_id}', [App\Http\Controllers\ApiController::class, 'new_profile']);

Route::post('account_edit_post', [App\Http\Controllers\ApiController::class, 'account_edit_post']);

Route::post('movie_currentTime', [App\Http\Controllers\ApiController::class, 'movie_currentTime']);
Route::post('episode_currentTime', [App\Http\Controllers\ApiController::class, 'episode_currentTime']);
Route::post('get_movie_time', [App\Http\Controllers\ApiController::class, 'get_movie_time']);
Route::post('get_episode_time', [App\Http\Controllers\ApiController::class, 'get_episode_time']);
Route::get('get_icons', [App\Http\Controllers\ApiController::class, 'get_icons']);

Route::get('get_advertisement_movie/{movie}', [App\Http\Controllers\ApiController::class, 'get_advertisement_movie']);
Route::get('get_advertisement_episode/{episode}', [App\Http\Controllers\ApiController::class, 'get_advertisement_episode']);

Route::post('search/{search}', [App\Http\Controllers\ApiController::class, 'search']);
Route::get('home', [App\Http\Controllers\ApiController::class, 'home_content']);
Route::get('detail_movie/{id}', [App\Http\Controllers\ApiController::class, 'detail_movie']);
Route::post('genres', [App\Http\Controllers\ApiController::class, 'genres']);
Route::post('shows', [App\Http\Controllers\ApiController::class, 'shows']);
Route::post('shows_by_genre/{genre}', [App\Http\Controllers\ApiController::class, 'shows_by_genre']);
Route::post('show_details/{show}', [App\Http\Controllers\ApiController::class, 'show_details']);
Route::post('seasons/{show}', [App\Http\Controllers\ApiController::class, 'show_seasons']);
Route::post('episodes/{season}/{user}', [App\Http\Controllers\ApiController::class, 'season_episodes']);
Route::post('movies', [App\Http\Controllers\ApiController::class, 'movies']);
Route::post('movies_by_genre/{genre}', [App\Http\Controllers\ApiController::class, 'movies_by_genre']);
Route::post('movies_details/{movie}', [App\Http\Controllers\ApiController::class, 'movie_details']);


Route::middleware('auth:api')->get('/dashboard', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->get('/advertisement', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->get('/avatar', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/genre', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/movie', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/profile', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/rental', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/rolepermission', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/setting', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/show', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/subscription', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/view', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/visit', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/withdraw', function (Request $request) {
    return $request->user();
});