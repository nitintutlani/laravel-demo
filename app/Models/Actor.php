<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_year',
        'eye_color',
        'gender',
        'hair_color',
    ];
    protected $appends = ['url'];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function getUrlAttribute()
    {
        return config('app.url') . '/api/actors/' . $this->attributes['id'];
    }

    public function scopeQueryParams($query, $params)
    {
        $page = isset($params['page']) ? $params['page'] : 1;
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $query = $query->paginate($limit, ['*'], 'page', $page);

        if (isset($params['name'])) {
            $query = $query->where('name', 'like', '%' . $params['name'] . '%');
        }
        return $query;
    }
}
