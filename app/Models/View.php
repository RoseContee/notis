<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Movie;
use App\Models\Profile;
use App\Models\Episode;

class View extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function movies()
    {
        return $this->morphedByMany(Movie::class, 'viewable', 'views', 'id');
    }

    public function episodes()
    {
        return $this->morphedByMany(Episode::class, 'viewable', 'views', 'id');
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
