<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'adress_id',
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

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes)  => ucfirst($attributes['lastname'] . ' '  . $attributes['firstname'])
        );
    }

    public function password(): Attribute
    {
        return new Attribute(
            set: fn (string $value) => Hash::make($value)
        );
    }
    
    public function role(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(Role::class);
    }

    

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function document(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Document::class);
    }

    public function adress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Adress::class);
    }
}
