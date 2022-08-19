<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'website_url', 'devise', 'photo_url', 'email'
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'founded' => 'datetime'
    ];

    public function location(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Localisation::class, 'localisable');
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function featuredPhoto()
    {
        return $this->morphOne(Photo::class, 'photoable')->latestOfMany();
    }

    public function adress()
    {
        return $this->morphOne(Adress::class, 'adressable');
    }

    public function faculties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Faculty::class, table: 'universities_faculties');
    }
}
