<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'number_ticket',
        'sport_id',
        'location_id',
    ];
    public function booking():BelongsToMany
    {
        return $this->belongsToMany(Booking::class);
    }
    public function competition():HasMany
    {
        return $this->hasMany(Competition::class);
    }
    public function sport():HasOne
    {
        return $this->hasOne(Sport::class);
    }
    public function location():HasOne
    {
        return $this->hasOne(Location::class);
    }
}
