<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::post('/add_payment_method', [App\Http\Controllers\HomeController::class, 'add_payment_method'])->middleware('auth')->name('add_payment_method');
Route::get('/delete_payment_method', [App\Http\Controllers\HomeController::class, 'delete_payment_method'])->middleware('auth')->name('delete_payment_method');
// Route::domain('stream.notisstudios.com')->group(function () {

    Route::prefix('dashboard')->middleware(['auth', 'role:admin|super_admin|user'])->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    });

//----------------role request start-----------------------//
    Route::get('role_request', [App\Http\Controllers\Admin\RoleController::class, 'role_request'])->name('role_request');
    Route::post('role_request', [App\Http\Controllers\Admin\RoleController::class, 'post_role_request'])->name('post_role_request');
//----------------role request end-----------------------//

//----------------referal withdraw start-----------------------//
    Route::get('withdraws', [App\Http\Controllers\Admin\WithdrawController::class, 'user_withdraws'])->name('withdraws');
    Route::get('new_withdraws', [App\Http\Controllers\Admin\WithdrawController::class, 'new_withdraws'])->name('new_withdraws');
    Route::post('new_withdraws', [App\Http\Controllers\Admin\WithdrawController::class, 'post_new_withdraws'])->name('post_new_withdraws');
//----------------referal withdraw end-----------------------//

//----------------admin withdraw start-----------------------//
    Route::get('admin_withdraws', [App\Http\Controllers\Admin\WithdrawController::class, 'admin_withdraws'])->name('admin.withdraws');
    Route::get('withdraws/types', [App\Http\Controllers\Admin\WithdrawController::class, 'withdrawsTypes'])->name('withdraws.types');
    Route::get('withdraws/types/add', [App\Http\Controllers\Admin\WithdrawController::class, 'withdrawsTypesAdd'])->name('withdraws.types.add');
    Route::any('withdraws/types/delete/{id}', [App\Http\Controllers\Admin\WithdrawController::class, 'withdrawsTypesdestroy'])->name('withdraws.types.delete');
    Route::post('withdraws/types/store', [App\Http\Controllers\Admin\WithdrawController::class, 'withdrawsTypesstore'])->name('withdraws.types.store');
    Route::post('withdraws/types/status', [App\Http\Controllers\Admin\WithdrawController::class, 'withdrawsTypesStatus'])->name('withdraws.types.status');

    Route::get('withdraw_approve/{id}', [App\Http\Controllers\Admin\WithdrawController::class, 'withdraw_approve'])->name('withdraw_approve');
    Route::get('withdraw_reject/{id}', [App\Http\Controllers\Admin\WithdrawController::class, 'withdraw_reject'])->name('withdraw_reject');

//----------------admin withdraw end-----------------------//

    Route::prefix('advertisements')->group(function() {

        Route::middleware(['auth', 'role:admin|super_admin|advertisements'])->group(function() {
            Route::get('/deposit', [App\Http\Controllers\Admin\AdvertisementController::class, 'deposit'])->middleware(['permission:view_advertisements'])->name('advertisements.deposit');

            Route::put('/postDeposit', [App\Http\Controllers\Admin\AdvertisementController::class, 'postDeposit'])->middleware(['permission:view_advertisements'])->name('advertisements.postDeposit');

            Route::get('/all', [App\Http\Controllers\Admin\AdvertisementController::class, 'index'])->middleware(['permission:view_advertisements'])->name('advertisements.all');
            
            Route::get('/create', [App\Http\Controllers\Admin\AdvertisementController::class, 'create'])->name('advertisement.create');

            Route::get('/getSeasonsByShow', [App\Http\Controllers\Admin\AdvertisementController::class, 'getSeasonsByShow'])->name('advertisement.seasons_by_show');

            Route::get('/getEpisodeBySeason', [App\Http\Controllers\Admin\AdvertisementController::class, 'getEpisodeBySeason'])->name('advertisement.episodes_by_season');

            Route::post('/store', [App\Http\Controllers\Admin\AdvertisementController::class, 'store'])->name('advertisement.store');
            Route::get('/edit/{advertisement}', [App\Http\Controllers\Admin\AdvertisementController::class, 'edit'])->name('advertisement.edit');
            Route::put('/update/{advertisement}', [App\Http\Controllers\Admin\AdvertisementController::class, 'update'])->name('advertisement.update');
            Route::delete('/delete/{advertisement}', [App\Http\Controllers\Admin\AdvertisementController::class, 'destroy'])->name('advertisement.delete');
        });
    });

    Route::prefix('avatar')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\AvatarController::class, 'index'])->name('avatars.all');
        Route::get('/create', [App\Http\Controllers\Admin\AvatarController::class, 'create'])->name('avatar.create');
        Route::post('/store', [App\Http\Controllers\Admin\AvatarController::class, 'store'])->name('avatar.store');
        Route::delete('/delete/{avatar}', [App\Http\Controllers\Admin\AvatarController::class, 'destroy'])->name('avatar.delete');
    });


    Route::prefix('category')->middleware(['auth'])->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.all');
        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
        Route::delete('/delete/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');
    });

    Route::prefix('top_category')->middleware(['auth'])->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'top_index'])->name('top_category.all');

        Route::get('/edit/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'top_edit'])->name('top_category.edit');
    });
    Route::get('/top_category_create', [App\Http\Controllers\Admin\CategoryController::class, 'top_create'])->name('top_category.create');

    Route::prefix('media-category')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\MediaCategoryController::class, 'index'])->name('media_categories.all');
        Route::get('/create', [App\Http\Controllers\Admin\MediaCategoryController::class, 'create'])->name('media_category.create');
        Route::post('/store', [App\Http\Controllers\Admin\MediaCategoryController::class, 'store'])->name('media_category.store');
        Route::get('/edit/{media_category}', [App\Http\Controllers\Admin\MediaCategoryController::class, 'edit'])->name('media_category.edit');
        Route::put('/update/{media_category}', [App\Http\Controllers\Admin\MediaCategoryController::class, 'update'])->name('media_category.update');
        Route::delete('/delete/{media_category}', [App\Http\Controllers\Admin\MediaCategoryController::class, 'destroy'])->name('media_category.delete');
    });

    Route::prefix('contribute')->middleware(['auth', 'role:admin|super_admin|contributor'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\ContributeController::class, 'index'])->name('contribute.all');
        Route::get('/create', [App\Http\Controllers\Admin\ContributeController::class, 'create'])->name('contribute.create');
        Route::post('/store', [App\Http\Controllers\Admin\ContributeController::class, 'store'])->name('contribute.store');
        Route::get('/edit/{contribute}', [App\Http\Controllers\Admin\ContributeController::class, 'edit'])->name('contribute.edit');
        Route::put('/update/{contribute}', [App\Http\Controllers\Admin\ContributeController::class, 'update'])->name('contribute.update');
        Route::delete('/delete/{contribute}', [App\Http\Controllers\Admin\ContributeController::class, 'destroy'])->name('contribute.delete');

    });

    Route::prefix('network')->middleware(['auth', 'role:admin|super_admin|contributor'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\NetworkController::class, 'list'])->name('network.all');
        Route::get('/index', [App\Http\Controllers\Admin\NetworkController::class, 'index'])->name('network.index');
        Route::post('/store', [App\Http\Controllers\Admin\NetworkController::class, 'store'])->name('network.store');
        Route::get('/edit/{network}', [App\Http\Controllers\Admin\NetworkController::class, 'edit'])->name('network.edit');
        Route::put('/update/{network}', [App\Http\Controllers\Admin\NetworkController::class, 'update'])->name('network.update');
    });


    Route::prefix('genres')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\GenreController::class, 'index'])->name('genres.all');
        Route::get('/create', [App\Http\Controllers\Admin\GenreController::class, 'create'])->name('genre.create');
        Route::post('/store', [App\Http\Controllers\Admin\GenreController::class, 'store'])->name('genre.store');
        Route::get('/edit/{genre}', [App\Http\Controllers\Admin\GenreController::class, 'edit'])->name('genre.edit');
        Route::put('/update/{genre}', [App\Http\Controllers\Admin\GenreController::class, 'update'])->name('genre.update');
        Route::delete('/delete/{genre}', [App\Http\Controllers\Admin\GenreController::class, 'destroy'])->name('genre.delete');
    });

    Route::prefix('movies')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all/{media_category_id}', [App\Http\Controllers\Admin\MovieController::class, 'index'])->name('movies.all');
        Route::get('/create/{media_category_id}', [App\Http\Controllers\Admin\MovieController::class, 'create'])->name('movie.create');
        Route::post('/store', [App\Http\Controllers\Admin\MovieController::class, 'store'])->name('movie.store');
        Route::get('/edit/{movie}', [App\Http\Controllers\Admin\MovieController::class, 'edit'])->name('movie.edit');
        Route::put('/update/{movie}', [App\Http\Controllers\Admin\MovieController::class, 'update'])->name('movie.update');
        Route::delete('/delete/{movie}', [App\Http\Controllers\Admin\MovieController::class, 'destroy'])->name('movie.delete');
    });


    Route::prefix('room')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\RentalController::class, 'index'])->name('rooms.all');
        Route::get('/create', [App\Http\Controllers\Admin\RentalController::class, 'create'])->name('room.create');
        Route::post('/store', [App\Http\Controllers\Admin\RentalController::class, 'store'])->name('room.store');
        Route::get('/edit/{room}', [App\Http\Controllers\Admin\RentalController::class, 'edit'])->name('room.edit');
        Route::put('/update/{room}', [App\Http\Controllers\Admin\RentalController::class, 'update'])->name('room.update');
        Route::delete('/delete/{room}', [App\Http\Controllers\Admin\RentalController::class, 'destroy'])->name('room.delete');
    });

    Route::prefix('equipment')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\RentalController::class, 'equipment_index'])->name('equipments.all');
        Route::get('/create', [App\Http\Controllers\Admin\RentalController::class, 'equipment_create'])->name('equipment.create');
        Route::post('/store', [App\Http\Controllers\Admin\RentalController::class, 'equipment_store'])->name('equipment.store');
        Route::get('/edit/{equipment}', [App\Http\Controllers\Admin\RentalController::class, 'equipment_edit'])->name('equipment.edit');
        Route::put('/update/{equipment}', [App\Http\Controllers\Admin\RentalController::class, 'equipment_update'])->name('equipment.update');
        Route::delete('/delete/{equipment}', [App\Http\Controllers\Admin\RentalController::class, 'equipment_destroy'])->name('equipment.delete');
    });


    Route::prefix('rolepermission')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\RolePermissionController::class, 'index'])->name('rolepermission.all');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\RolePermissionController::class, 'edit'])->name('rolepermission.edit');
        Route::post('/edit', [App\Http\Controllers\Admin\RolePermissionController::class, 'update'])->name('rolepermission.update');
    });
    Route::prefix('role')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role.all');
        Route::get('/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('role.create');
        Route::post('/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('role.add');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role.edit');
        Route::post('/edit', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.delete');

    });
    Route::prefix('permission')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permission.all');
        Route::get('/create', [App\Http\Controllers\Admin\PermissionController::class, 'create'])->name('permission.create');
        Route::post('/store', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('permission.add');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/edit', [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('permission.update');
        Route::get('/delete/delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('permission.delete');

    });


    Route::prefix('settings')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings');
        Route::put('/update/{setting}', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });


    Route::prefix('shows')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all/{media_category_id}', [App\Http\Controllers\Admin\ShowController::class, 'index'])->name('shows.all');
        Route::get('/create/{media_category_id}', [App\Http\Controllers\Admin\ShowController::class, 'create'])->name('show.create');
        Route::post('/store', [App\Http\Controllers\Admin\ShowController::class, 'store'])->name('show.store');
        Route::get('/edit/{show}', [App\Http\Controllers\Admin\ShowController::class, 'edit'])->name('show.edit');
        Route::put('/update/{show}', [App\Http\Controllers\Admin\ShowController::class, 'update'])->name('show.update');
        Route::delete('/delete/{show}', [App\Http\Controllers\Admin\ShowController::class, 'destroy'])->name('show.delete');
    });

    Route::prefix('seasons')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all/{media_category}', [App\Http\Controllers\Admin\ShowController::class, 'season_index'])->name('seasons.all');
        Route::get('/create/{media_category}', [App\Http\Controllers\Admin\ShowController::class, 'season_create'])->name('season.create');
        Route::post('/store', [App\Http\Controllers\Admin\ShowController::class, 'season_store'])->name('season.store');
        Route::get('/edit/{season}', [App\Http\Controllers\Admin\ShowController::class, 'season_edit'])->name('season.edit');
        Route::put('/update/{season}', [App\Http\Controllers\Admin\ShowController::class, 'season_update'])->name('season.update');
        Route::delete('/delete/{season}', [App\Http\Controllers\Admin\ShowController::class, 'season_destroy'])->name('season.delete');
    });

    Route::prefix('episodes')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/all/{media_category}', [App\Http\Controllers\Admin\ShowController::class, 'episode_index'])->name('episodes.all');
        Route::get('/create/{media_category}', [App\Http\Controllers\Admin\ShowController::class, 'episode_create'])->name('episode.create');
        Route::post('/store', [App\Http\Controllers\Admin\ShowController::class, 'episode_store'])->name('episode.store');
        Route::get('/edit/{episode}', [App\Http\Controllers\Admin\ShowController::class, 'episode_edit'])->name('episode.edit');
        Route::put('/update/{episode}', [App\Http\Controllers\Admin\ShowController::class, 'episode_update'])->name('episode.update');
        Route::delete('/delete/{episode}', [App\Http\Controllers\Admin\ShowController::class, 'episode_destroy'])->name('episode.delete');
    });

    Route::prefix('subscriptions')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('subscription.all');
        Route::get('/create', [App\Http\Controllers\Admin\SubscriptionController::class, 'create'])->name('subscription.create');
        Route::post('/store', [App\Http\Controllers\Admin\SubscriptionController::class, 'store'])->name('subscription.store');
        Route::get('/edit/{subscription}', [App\Http\Controllers\Admin\SubscriptionController::class, 'edit'])->name('subscription.edit');
        Route::get('/clone/{subscription}', [App\Http\Controllers\Admin\SubscriptionController::class, 'clone'])->name('subscription.clone');
        Route::put('/update/{subscription}', [App\Http\Controllers\Admin\SubscriptionController::class, 'update'])->name('subscription.update');
        Route::delete('/delete/{subscription}', [App\Http\Controllers\Admin\SubscriptionController::class, 'destroy'])->name('subscription.delete');
    });

    Route::prefix('user')->group(function() {
        Route::middleware(['auth', 'role:admin|super_admin|advertisements'])->controller(App\Http\Controllers\Admin\UserController::class)->group(function() {
            Route::get('profile', 'profile')->name('user.profile');
            Route::post('profile/update', 'profileUpdate')->name('user.profile.update');
        });

        Route::middleware(['auth', 'role:admin|super_admin'])->group(function() {

            Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
                Route::get('affiliation/{user?}', 'affiliation')->middleware(['role:user'])->name('user.affiliation');
                // Route::get('profile', 'profile')->name('user.profile');
                Route::get('all', 'index')->middleware(['permission:view_users'])->name('user.all');
                Route::get('create', 'create')->middleware(['permission:create_create'])->name('user.create');
                Route::post('store', 'store')->middleware(['permission:create_create'])->name('user.store');
                // Route::post('profile/update', 'profileUpdate')->name('user.profile.update');
                Route::get('detail/{user}', 'detail')->middleware(['permission:user_detail'])->name('user.detail');
                Route::get('admin/accounts/{user}', 'accounts')->middleware(['permission:user_accounts'])->name('user.admin.accounts');
                Route::post('update', 'update')->middleware(['permission:user_detail'])->name('user.update');
                Route::get('affiliation/user/{user}', 'user_affiliation')->name('user.affiliation.admin');
                Route::get('agreement/user/{user}', 'user_agreement')->name('user.agreement.admin');
                Route::get('account/{user}', 'user_account')->name('user.account');
                Route::get('transactions/{user}', 'transactions')->name('user.transactions.admin');
                Route::post('add', 'add_user')->name('add.user');
                Route::get('delete/{user}', 'destroy')->name('user.delete');
                Route::get('affliation/setting', 'affliation_setting')->name('affliation.setting');
                Route::post('affliation/setting/addorupdate', 'affliation_add_update')->name('affliation.setting.add.update');

                Route::post('tax/setting/addorupdate', 'tax_add_update')->name('tax.setting.add.update');
                Route::get('tax_document', 'tax_document')->name('user.tax_document');
                Route::post('tax_document_post', 'tax_document_post')->name('user.tax_document_post');

                Route::get('view_agreement', 'view_agreement')->name('user.view.agreement');
                Route::post('agreement/setting/addorupdate', 'agreement_add_update')->name('agreement.setting.add.update');
            });
        });
    });


    Route::prefix('views')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::any('/all/{type?}/{id?}/{to?}', [App\Http\Controllers\Admin\ViewController::class, 'index'])->name('views.movies.all');
        Route::any('/graph', [App\Http\Controllers\Admin\ViewController::class, 'views_graph'])->name('views_graph');
        Route::any('/shows/{type?}/{id?}/{to?}', [App\Http\Controllers\Admin\ViewController::class, 'views_shows'])->name('views.shows.all');
        Route::any('/shows/graph', [App\Http\Controllers\Admin\ViewController::class, 'shows_graph'])->name('shows_graph');
        Route::any('/ads', [App\Http\Controllers\Admin\ViewController::class, 'views_ads'])->name('views.ads.all');
    });


    Route::any('/analytics', [App\Http\Controllers\Admin\ViewController::class, 'analytics'])->name('analytics');


    Route::prefix('visits')->middleware(['auth', 'role:admin|super_admin'])->group(function() {
        Route::any('/all/{type?}/{id?}/{to?}', [App\Http\Controllers\Admin\VisitController::class, 'index'])->name('visits.all');
        Route::any('/visits_graph', [App\Http\Controllers\Admin\VisitController::class, 'visits_graph'])->name('visits_graph');
    });

    Route::get('/stream', function () {
        return redirect(url('/'));
    });

    Route::get('/rental', function () {
        return redirect()->route('rental');
    });



    Route::view('/about_us', 'about_us')->name('about_us');
    Route::view('/terms', 'terms')->name('terms');
    Route::get('/networks', [App\Http\Controllers\HomeController::class, 'network'])->name('networks');
    Route::view('/privacy_policy', 'privacy_policy')->name('privacy_policy');
    Route::view('/contact_us', 'contactus')->name('contact_us');
    Route::post('/contact_us_post', [App\Http\Controllers\HomeController::class, 'contact_us_post'])->name('contact_us_post');

    Route::post('/get_ad_images', [App\Http\Controllers\HomeController::class, 'get_ad_images'])->middleware('auth', 'profileSelected')->name('movie.get_ad_images');

    Route::post('/get_ad_videos', [App\Http\Controllers\HomeController::class, 'get_ad_videos'])->middleware('auth', 'profileSelected')->name('movie.get_ad_videos');

    Route::post('/get_ad_episode_images', [App\Http\Controllers\HomeController::class, 'get_ad_episode_images'])->middleware('auth', 'profileSelected')->name('episode.get_ad_episode_images');

    Route::post('/get_ad_episode_videos', [App\Http\Controllers\HomeController::class, 'get_ad_episode_videos'])->middleware('auth', 'profileSelected')->name('episode.get_ad_episode_videos');

    Route::post('/movie_currentTime', [App\Http\Controllers\HomeController::class, 'movie_currentTime'])->middleware('auth', 'profileSelected')->name('movie.currentTime');
    Route::post('/episode_currentTime', [App\Http\Controllers\HomeController::class, 'episode_currentTime'])->middleware('auth', 'profileSelected')->name('episode.currentTime');

    Route::post('/profile_streaming_on', [App\Http\Controllers\HomeController::class, 'profile_streaming_on'])->middleware('auth', 'profileSelected')->name('profile_streaming_on');
    Route::post('/profile_streaming_off', [App\Http\Controllers\HomeController::class, 'profile_streaming_off'])->middleware('auth', 'profileSelected')->name('profile_streaming_off');

    Route::get('/switch_profile', function () {
        Session::forget('selected_profile');
        return redirect()->route('select_profile');
    })->middleware('auth')->name('switch_profile');

    Route::middleware(['visits'])->group(function () {

        // Profile Selected Middleware
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('profileSelected')->name('home');
        Route::get('/movie/{movie}', [App\Http\Controllers\HomeController::class, 'movie'])->middleware('profileSelected')->name('movie');
        Route::get('/show/{show}', [App\Http\Controllers\HomeController::class, 'show'])->middleware('profileSelected')->name('show');
        Route::get('/season/{season}', [App\Http\Controllers\HomeController::class, 'season'])->middleware('profileSelected')->name('season');
        Route::get('/watch_movie/{movie}', [App\Http\Controllers\HomeController::class, 'watch_movie'])->middleware('auth', 'profileSelected')->name('watch_movie');
        Route::get('/watch_episode/{episode}', [App\Http\Controllers\HomeController::class, 'watch_episode'])->middleware('auth', 'profileSelected')->name('watch_episode');
        Route::get('/account_edit', [App\Http\Controllers\HomeController::class, 'account_edit'])->middleware('auth', 'role:user|super_admin')->name('account_edit');
        Route::post('/account_edit_post', [App\Http\Controllers\HomeController::class, 'account_edit_post'])->middleware('auth', 'role:user|super_admin')->name('account_edit_post');
        Route::get('/movies/{media_category_id}', [App\Http\Controllers\HomeController::class, 'movies'])->middleware('profileSelected')->name('movies');
        Route::get('/tvshows/{media_category_id}', [App\Http\Controllers\HomeController::class, 'tvshows'])->middleware('profileSelected')->name('tvshows');
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->middleware('auth', 'role:user', 'profileSelected')->name('profile');
        Route::get('/change_avatar/{avatar}', [App\Http\Controllers\HomeController::class, 'change_avatar'])->middleware('auth', 'role:user|super_admin')->name('change_avatar');


        // Contributor Middle ware
        Route::get('/my_movies', [App\Http\Controllers\HomeController::class, 'my_movies'])->middleware('auth', 'role:Contributor')->name('my_movies');


        // only Auth Middleware
        Route::get('/change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->middleware('auth', 'role:user')->name('change_password');
        Route::post('/change_password_post', [App\Http\Controllers\HomeController::class, 'change_password_post'])->middleware('auth', 'role:user')->name('change_password_post');
        Route::get('/pricing', [App\Http\Controllers\HomeController::class, 'pricing'])->name('pricing');
        Route::get('/get_stripePaymentForm', [App\Http\Controllers\HomeController::class, 'get_stripePaymentForm'])->middleware('auth')->name('get_stripePaymentForm');
        Route::get('/get_paypalPaymentForm', [App\Http\Controllers\HomeController::class, 'get_paypalPaymentForm'])->middleware('auth')->name('get_paypalPaymentForm');
        Route::post('/paypal_modal_success', [App\Http\Controllers\HomeController::class, 'paypal_modal_success'])->middleware('auth')->name('paypal_modal_success');
        Route::get('/payment_method', [App\Http\Controllers\HomeController::class, 'payment_method'])->middleware('auth')->name('payment_method');

        Route::post('order-post', [App\Http\Controllers\HomeController::class, 'orderPost'])->middleware(['auth'])->name('order-post');
        Route::get('select_profile/{profileid?}', [App\Http\Controllers\HomeController::class, 'select_profile'])->middleware(['auth'])->name('select_profile');
        Route::get('new_profile/{user_id}', [App\Http\Controllers\HomeController::class, 'new_profile'])->middleware(['auth'])->name('new_profile');
    });

    Route::get('stripe/cancel_subscription', [\App\Http\Controllers\HomeController::class, 'stripe_cancel_subscription'])->name('stripe.cancel_subscription');
    Route::get('paypal/cancel_subscription', [\App\Http\Controllers\HomeController::class, 'paypal_cancel_subscription'])->name('paypal.cancel_subscription');
// });

// Rental Routes
Route::domain('rental.notisstudios.com')->group(function () {
    Route::get('/', [\App\Http\Controllers\RentalController::class, 'index'])->name('rental');

//    Route::get('rental', [\App\Http\Controllers\RentalController::class, 'index'])->name('rental');
    Route::get('top_category/{category}', [\App\Http\Controllers\RentalController::class, 'top_category'])->name('top_category');
    Route::get('category_product/{category}', [\App\Http\Controllers\RentalController::class, 'category_product'])->name('category_product');
    Route::get('view_equipment/{equipment}', [\App\Http\Controllers\RentalController::class, 'view_equipment'])->name('view_equipment');
    Route::get('view_room/{room}', [\App\Http\Controllers\RentalController::class, 'view_room'])->name('view_room');
    Route::get('rooms/{category}', [\App\Http\Controllers\RentalController::class, 'rooms'])->name('rooms');
    Route::get('rental_signin', [\App\Http\Controllers\RentalController::class, 'rental_signin'])->name('rental.signin');
    Route::get('rental_signup', [\App\Http\Controllers\RentalController::class, 'rental_signup'])->name('rental.signup');

    Route::post('special_request', [\App\Http\Controllers\RentalController::class, 'special_request'])->name('special_request');

    Route::get('/bookings/check', [\App\Http\Controllers\BookingController::class, 'checkAvailability'])->middleware(['auth']);
    Route::get('/monthly_bookings/check', [\App\Http\Controllers\BookingController::class, 'monthly_bookings_check'])->middleware(['auth']);
    Route::post('/store_monthly_room', [\App\Http\Controllers\BookingController::class, 'store_monthly_room'])->middleware(['auth']);
    Route::get('/checkDaysAvailability', [\App\Http\Controllers\BookingController::class, 'checkDaysAvailability'])->middleware(['auth']);
    Route::get('/boooking_modal', [\App\Http\Controllers\BookingController::class, 'boooking_modal'])->middleware(['auth']);
    Route::post('/store_slots', [\App\Http\Controllers\BookingController::class, 'store_slots'])->middleware(['auth']);
    Route::post('/store_special_days', [\App\Http\Controllers\BookingController::class, 'store_special_days'])->middleware(['auth']);
    Route::post('/store_consective_days', [\App\Http\Controllers\BookingController::class, 'store_consective_days'])->middleware(['auth']);
    Route::delete('/booking/{bookableType}/{bookableId}', [\App\Http\Controllers\BookingController::class, 'destroy'])->middleware(['auth'])->name('booking.delete');
    Route::get('/checkout', [\App\Http\Controllers\RentalController::class, 'checkout'])->middleware(['auth'])->name('rental.checkout');
    Route::post('/equipment_buy', [\App\Http\Controllers\RentalController::class, 'equipment_buy'])->middleware(['auth'])->name('equipment.buy');
    Route::get('/order_delete/{order}', [\App\Http\Controllers\RentalController::class, 'order_delete'])->middleware(['auth'])->name('order.delete');
    Route::get('/rental_dashboard', [\App\Http\Controllers\RentalController::class, 'rental_dashboard'])->middleware(['auth'])->name('rental.dashboard');
    Route::get('/rental_bookings', [\App\Http\Controllers\RentalController::class, 'rental_bookings'])->middleware(['auth'])->name('rental.bookings');
    Route::get('/delete_booking/{booking}', [\App\Http\Controllers\RentalController::class, 'delete_booking'])->middleware(['auth'])->name('rental.delete_booking');
    Route::get('/rental_purchases', [\App\Http\Controllers\RentalController::class, 'rental_purchases'])->middleware(['auth'])->name('rental.purchases');
    Route::get('/rental_account_detail', [\App\Http\Controllers\RentalController::class, 'rental_account_detail'])->middleware(['auth'])->name('rental.account_detail');
    Route::get('/rental_payment_method', [\App\Http\Controllers\RentalController::class, 'rental_payment_method'])->middleware(['auth'])->name('rental.payment_method');
    Route::get('/rental_complete_orders', [\App\Http\Controllers\RentalController::class, 'rental_complete_orders'])->middleware(['auth'])->name('rental.complete_orders');
    Route::get('/all_rooms', [\App\Http\Controllers\RentalController::class, 'all_rooms'])->name('rental.all_rooms');
    Route::get('/seperate_page/{equipment}', [\App\Http\Controllers\RentalController::class, 'seperate_page'])->name('rental.seperate_page');
    Route::get('/all_equipment', [\App\Http\Controllers\RentalController::class, 'all_equipment'])->name('rental.all_equipment');

    Route::post('/update_account_detail', [App\Http\Controllers\HomeController::class, 'update_account_detail'])->middleware('auth')->name('update_account_detail');

    Route::get('/hire', [\App\Http\Controllers\RentalController::class, 'hire'])->name('rental.hire');
    Route::post('/hire_post', [\App\Http\Controllers\RentalController::class, 'hire_post'])->name('rental.hire.post');
});
