<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $table = 'films';

    public function category()
    {
        return $this->hasOne('App\FilmCategory','id');
    }
}
