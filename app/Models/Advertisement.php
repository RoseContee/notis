<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Season;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Advertisement extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;

    public function movies()
    {
        return $this->morphedByMany(Movie::class, 'advertisementable');
    }

    public function episodes()
    {
        return $this->morphedByMany(Episode::class, 'advertisementable');
    }

    public function seasons()
    {
        return $this->morphedByMany(Season::class, 'advertisementable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
