<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $appends = ['url'];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function getUrlAttribute()
    {
        return config('app.url') . '/api/actors/' . $this->attributes['id'];
    }
}
