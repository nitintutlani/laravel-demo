<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actor;

class Movie extends Model
{
    use HasFactory;

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }
}
