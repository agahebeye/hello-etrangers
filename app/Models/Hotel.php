<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillabe = ['name', 'room_count'];

    protected $appends = ['model_link'];

    protected function modelLink(): Attribute {
        return Attribute::get(fn() => $this->getTable());
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Localisation::class, 'localisable');
    }

    public function photos(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable')->latestOfMany();
    }
    

    public function adress()
    {
        return $this->morphOne(Adress::class, 'adressable');
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
