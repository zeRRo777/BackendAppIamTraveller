<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attraction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id', );
    }

    public function images(): HasMany
    {
        return $this->hasMany(Attraction_image::class, 'attraction_id', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(User_attraction_history::class, 'attraction_id', 'id');
    }
}
