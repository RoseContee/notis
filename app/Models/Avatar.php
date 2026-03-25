<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Profile;

class Avatar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
