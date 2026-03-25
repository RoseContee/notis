<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdsView extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ads()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function movies()
    {
        return $this->morphedByMany(Movie::class, 'viewable', 'ads_views', 'id');
    }

    public function episodes()
    {
        return $this->morphedByMany(Episode::class, 'viewable', 'ads_views', 'id');
    }
}
