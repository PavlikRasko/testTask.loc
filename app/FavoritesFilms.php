<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoritesFilms extends Model
{
    protected $table='favorites_films';

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function films()
    {
        return $this->hasMany('App\Films');
    }
}
