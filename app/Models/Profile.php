<?php

namespace App\Models;

use App\Models\User;
use App\Models\WatchTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Avatar;
use App\Models\View;
use App\Models\Visit;
use Spatie\Activitylog\Traits\LogsActivity;

class Profile extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;

    public function user()
    {
        return $this->belongsTo(User::class);
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
    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }
}
