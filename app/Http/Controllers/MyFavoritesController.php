<?php

namespace App\Http\Controllers;

use App\FavoritesFilms;
use App\FilmCategory;
use App\Films;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyFavoritesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $film_list = Auth::user()->favorite_films();
        $category_list = FilmCategory::all();

        return view('my_favorites', [
            "film_list" => $film_list,
            "category_list" => $category_list
        ]);
    }

    public function getByCategory(Request $request)
    {
        $selected_category_list = $request->categories;
        $films = Auth::user()->favorite_films();
        $category_list = FilmCategory::all();

        $list = collect();
        foreach ($films as $item) {
            if (!empty($selected_category_list) && in_array($item->films_category_id, $selected_category_list)) {
                $list->push($item);
            } else if (empty($selected_category_list)) {
                $list->push($item);
            }
        }

        return view('my_favorites', [
            "film_list" => $list,
            "category_list" => $category_list,
            "selected_categories" => $selected_category_list
        ]);
    }

    public function delete(Request $request, $id)
    {
        if (FavoritesFilms::where('user_id', Auth::user()->id)->where('films_id', $id)->delete()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addToFavorites(Request $request, $id)
    {
        if (count(FavoritesFilms::where('user_id', Auth::user()->id)->where('films_id', $id)->get()) > 0) {
            return 0;
        }
        else {
            $table = new FavoritesFilms();
            $table->user_id = Auth::user()->id;
            $table->films_id = $id;

            if ($table->save()) {
                return 1;
            }
            else {
                return 0;
            }
        }
    }
}
