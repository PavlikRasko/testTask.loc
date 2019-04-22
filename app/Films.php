<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FilmCategory;

class Films extends Model
{
    protected $table = 'films';

    public function filmscategory()
    {
        return $this->belongsTo('App\FilmCategory', "films_category_id");
    }

    public function favorites()
    {
        return $this->belongsToMany('App\FavoritesFilms','favorites_films','films_id');
    }
}
