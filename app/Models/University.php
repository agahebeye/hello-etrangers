<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'name', 'website_url', 'devise', 'email'
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'founded' => 'datetime'
    ];

    protected $appends = ['model_link'];

    protected function modelLink(): Attribute {
        return Attribute::get(fn() => $this->getTable());
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Localisation::class, 'localisable');
    }

    public function adress()
    {
        return $this->morphOne(Adress::class, 'adressable');
    }

    public function faculties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Faculty::class, table: 'universities_faculties');
    }

    public function photo() {
        return $this->morphOne(Photo::class, 'photoable');
    }
}
