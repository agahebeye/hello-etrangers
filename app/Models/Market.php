<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Market extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /** @var array<int, string> */
    protected $fillabe = ['name', 'type', 'city_id'];

    protected $appends = ['model_link'];

    protected function modelLink(): Attribute {
        return Attribute::get(fn() => $this->getTable());
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
