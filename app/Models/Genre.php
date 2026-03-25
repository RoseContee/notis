<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Movie;
use App\Models\Show;
use Spatie\Activitylog\Traits\LogsActivity;

class Genre extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;

    public function movies()
    {
        return $this->morphedByMany(Movie::class, 'genreable');
    }

    public function shows()
    {
        return $this->morphedByMany(Show::class, 'genreable');
    }
}
