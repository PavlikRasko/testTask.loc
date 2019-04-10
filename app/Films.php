<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $table = 'films';

    public function filmscategory()
    {
        return $this->hasOne('App\FilmCategory');
    }
    public function favorites()
    {
        return $this->belongsToMany('App\FavoritesFilms','favorites_films');
    }
}
