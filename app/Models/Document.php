<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeStatus(Builder $query)
    {
        return match ($status = Request::input('status')) {
            'pending' => $query->whereNull('validated_at')->whereNull('rejected_at'),
            'validated' => $query->whereNotNull('validated_at'),
            'rejected' => $query->whereNotNull('rejected_at'),
            default => $query
        };
    }

    public function scopeSearch(Builder $query)
    {
        return $query->when(
            Request::input('search'),
            fn (Builder $query, $search) => $query
                ->whereRelation('user', 'first_name', 'LIKE', "%{$search}%")
                ->orWhereRelation('user', 'last_name', 'LIKE', "%{$search}%")
        );
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


    // public function applyFilters(Builder $query)
    // {
    //     return $query->search()->status();
    // }
}
