<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Profile;
use App\Models\Episode;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;

class WatchTime extends Model
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;

    public function movies()
    {
        return $this->morphedByMany(Movie::class, 'watchable');
    }

    public function episodes()
    {
        return $this->morphedByMany(Episode::class, 'watchable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
