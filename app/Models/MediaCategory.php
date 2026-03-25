<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Movie;
use App\Models\Show;
use Spatie\Activitylog\Traits\LogsActivity;

class MediaCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;

    public function movies()
    {
        return $this->morphedByMany(Movie::class, 'media_categorieable');
    }

    public function shows()
    {
        return $this->morphedByMany(Show::class, 'media_categorieable');
    }
}
