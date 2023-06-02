<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attraction_image extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function attraction(): BelongsTo
    {
        return $this->belongsTo(Attraction::class, 'attraction_id', 'id');
    }
}
