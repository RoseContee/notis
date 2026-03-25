<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Genre;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Show extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;


    public function genres()
    {
        return $this->morphToMany(Genre::class, 'genreable');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media_category()
    {
        return $this->belongsTo(MediaCategory::class);
    }
}
