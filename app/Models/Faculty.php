<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    /**
     * @var bool
     */
    public $timestamps = false;

    /** @var array<int, string> */
    protected $fillable = ['name'];

    public function universities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(University::class, table: 'universities_faculties');
    }
}
