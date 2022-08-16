<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'quarter',
        'avenue',
    ];

    public function adressable() {
        return $this->morphTo();
    } 
}
