<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_attraction_like extends Model
{
    use HasFactory, SoftDeletes;

    protected $table= 'user_attraction_likes';

    protected $guarded = [];
}
