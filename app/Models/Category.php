<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Equipment;
use App\Models\Room;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_cat');
    }
}
