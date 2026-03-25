<?php

namespace App\Models;

use App\Models\User;
use App\Models\WatchTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Advertisement;
use App\Models\Genre;
use App\Models\View;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Movie extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;

    public function genres()
    {
        return $this->morphToMany(Genre::class, 'genreable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contribute()
    {
        return $this->belongsTo(Contribute::class);
    }

    public function advertisements()
    {
        return $this->morphToMany(Advertisement::class, 'advertisementable');
    }

    public function watchTimes()
    {
        return $this->morphMany(WatchTime::class, 'watchable');
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function adsViews()
    {
        return $this->morphMany(AdsView::class, 'viewable');
    }

    public function media_category()
    {
        return $this->belongsTo(MediaCategory::class);
    }
}
