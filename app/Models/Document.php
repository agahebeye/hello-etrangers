<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
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

    public function scopeApplyFilters(Builder $query, $request)
    {
        $query->when(
            $request->search,
            fn (Builder $query, $search) => $query
                ->whereRelation('user', 'first_name', 'LIKE', "%{$search}%")
                ->orWhereRelation('user', 'last_name', 'LIKE', "%{$search}%")
        );

        $query->when(
            $request->status === 'pending',
            fn (Builder $query) => $query->whereNull('validated_at')->whereNull('rejected_at')
        );

        $query->when(
            $request->status === 'validated',
            fn (Builder $query) => $query->whereNotNull('validated_at')
        );

        $query->when(
            $request->status === 'rejected',
            fn (Builder $query) => $query->whereNotNull('rejected_at')
        );
    }
}
