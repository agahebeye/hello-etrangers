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
        'name', 'website_url', 'motto', 'founded_at', 'user_id'
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

    public function photo(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function adress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Adress::class);
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(City::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function faculties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Faculty::class, table: 'universities_faculties');
    }
}
