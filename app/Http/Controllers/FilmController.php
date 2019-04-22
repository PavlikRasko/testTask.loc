<?php

namespace App\Http\Controllers;

use App\Films;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
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
    public function index($id)
    {
        $data = Films::where("id", $id)->firstOrFail();

        return view('film', ["item" => $data]);
    }
}
