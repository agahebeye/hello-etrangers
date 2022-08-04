<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /** @var array<int, string> */
    protected $fillabe = ['name'];

    public function universities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(University::class);
    }

    public function markets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Market::class);
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Localisation::class, 'localisable');
    }
}