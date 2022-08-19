<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /** @var array<int, string> */
    protected $fillabe = ['name', 'type', 'city_id'];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Localisation::class, 'localisable');
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
    
    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable')->latestOfMany();
    }
}
