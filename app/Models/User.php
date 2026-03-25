<?php

namespace App\Models;

use App\Http\Middleware\ProfileSelectMiddleware;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Show;
use App\Models\Subscription;
use App\Models\View;
use App\Models\Visit;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;
use App\Models\Withdraw;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function p_subscriptions()
    {
        return $this->belongsToMany(Subscription::class,'p_subscriptions_user', 'user_id', 'p_subscription_id')->withPivot('expire_at', 'paypal_subscription_id', 'status', 'type');
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
    public function shows()
    {
        return $this->hasMany(Show::class);
    }
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
    public function views()
    {
        return $this->hasMany(View::class);
    }
    public function watchtimes()
    {
        return $this->hasMany(WatchTime::class);
    }
    public function profiles()
    {
        return $this->hasMany(\App\Models\Profile::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }
}
