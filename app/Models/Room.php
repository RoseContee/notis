<?php

namespace App\Models;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Room extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];
    
    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function getBookedDates($start, $end)
    {
        $bookedDates = Booking::where('bookable_id', $this->id)
            ->where(function ($query) {
                $query->where('status', 'confirmed')
                    ->orWhere(function ($query) {
                        $query->where('status', 'pending')
                            ->where('user_id', auth()->id());
                    });
            })
            ->where('bookable_type', get_class($this))
            ->whereBetween('date', [$start, $end])
            ->pluck('date')
            ->toArray();

        return $bookedDates;
    }

}
