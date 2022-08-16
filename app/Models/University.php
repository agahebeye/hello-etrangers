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
        'name', 'website_url', 'motto', 'founded_at'
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

    public function adress()
    {
        return $this->morphOne(Adress::class, 'adressable');
    }


    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function faculties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Faculty::class, table: 'universities_faculties');
    }
}
