<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
        return view('profile');
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'tel' => 'required',
        ]);
    }

    public function update(Request $request)
    {
        $this->validation($request);

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;

        if (Hash::check($request->old_password, $user->password) && ($request->new_password == $request->confirm_new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        if ($user->save()) {
            return 1;
        } else {
            return 0;
        }
    }
}
