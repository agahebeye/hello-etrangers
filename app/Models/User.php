<?php

namespace App\Models;

use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'adress_id',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['fullname'];

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes)  => ucfirst($attributes['last_name'] . ' '  . $attributes['first_name'])
        );
    }  
    
    public function isAdministrator()
    {
        return $this->role->name == 'Admininstrateur';
    }

    public function password(): Attribute
    {
        return new Attribute(
            set: fn (string $value) => Hash::make($value)
        );
    }
    
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function scopeOfRole(Builder $query, $role) {
        return $query->whereRelation('role', 'name', $role);
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function document(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Document::class)->withDefault([
            'avenue' => 'localhost',
        ]);
    }

    public function adress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Adress::class);
    }
}
