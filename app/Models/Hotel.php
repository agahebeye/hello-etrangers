<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillabe = ['name', 'room_count'];

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
}
