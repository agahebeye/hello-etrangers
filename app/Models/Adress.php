<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['location'];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(User::class);
    }
}
