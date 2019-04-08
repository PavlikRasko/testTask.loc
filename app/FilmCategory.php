<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmCategory extends Model
{
   protected $table='films_category';
    public function category()
    {
        return $this->hasOne('App\Films','category');
    }
}
