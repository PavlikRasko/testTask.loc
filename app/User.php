<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','tel', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function films()
    {
        return $this->belongsTo('App\FavoritesFilms');
    }

    public function favorite_films()
    {
        $favorite_films_ids = FavoritesFilms::where("user_id", $this->id)->get();
        $favorite_films = collect();
        foreach ($favorite_films_ids as $item) {
            $favorite_films->push(Films::where("id", $item->films_id)->first());
        }
        return $favorite_films;
    }


}
