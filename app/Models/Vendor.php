<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function stories(): HasMany
    {
        return $this->hasMany(Story::class);
    }
}
