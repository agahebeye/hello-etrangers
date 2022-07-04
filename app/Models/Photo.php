<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Photo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['src'];

    public function photoable(): MorphTo
    {
        return $this->morphTo();
    }
}
