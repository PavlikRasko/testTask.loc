<?php

namespace App\Http\Controllers;

use App\FavoritesFilms;
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
        return view('my_favorites');
    }
    public  function delete(Request $request){
       FavoritesFilms::get($request->name)->where('user_id',Auth::user()->id)->detach();
    }
}
