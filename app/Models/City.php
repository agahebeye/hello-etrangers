<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /** @var array<int, string> */
    protected $fillabe = ['name'];

    protected $appends = ['model_link'];

    protected function modelLink(): Attribute
    {
        return Attribute::get(fn () => $this->getTable());
    }

    public function universities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(University::class);
    }

    public function markets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Market::class);
    }

    public function hotels(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Hotel::class);
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable')->latestOfMany();
    }

    public function location()
    {
        return $this->morphOne(Localisation::class, 'localisable');
    }
}
