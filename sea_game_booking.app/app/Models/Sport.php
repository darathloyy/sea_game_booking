<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sport extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'gender',
    ];
    public function event():BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}
