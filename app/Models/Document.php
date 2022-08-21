<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Document extends Model
{
    use HasFactory;

    protected $casts = [
        'passport_validity' => 'datetime',
        'arrival_date' => 'datetime',
        'has_been_period' => 'datetime',
        'has_been' => 'boolean',
        'validated_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPassportValidityAttribute()
    {
        return Carbon::parse($this->attributes['passport_validity'])->format('Y-m-d');
    }

    public function getHasBeenPeriodAttribute()
    {
        return Carbon::parse($this->attributes['passport_validity'])->format('Y-m-d');
    }

    public function getArrivalDateAttribute()
    {
        return Carbon::parse($this->attributes['passport_validity'])->format('Y-m-d');
    }
}
