<?php

namespace App\Http\Controllers;

use App\FilmCategory;
use App\Films;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $film_list = Films::all();
        $category_list = FilmCategory::all();

        return view('home', [
            "film_list" => $film_list,
            "category_list" => $category_list
        ]);
    }

    public function getByCategory(Request $request)
    {
        $selected_category_list = $request->categories;
        $films = Films::all();
        $category_list = FilmCategory::all();

        $list = collect();
        foreach ($films as $item) {
            if (!empty($selected_category_list) && in_array($item->films_category_id, $selected_category_list)) {
                $list->push($item);
            }
            else if (empty($selected_category_list)) {
                $list->push($item);
            }
        }

        return view('home', [
            "film_list" => $list,
            "category_list" => $category_list,
            "selected_categories" => $selected_category_list
        ]);
    }
}
