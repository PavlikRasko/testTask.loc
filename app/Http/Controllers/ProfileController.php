<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $contact = User::where('id',Auth::user()->id)->firstOrFail();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->tel = $request->tel;
        $contact->created_at = date("Y-m-d H:i:s");
        $contact->updated_at = date("Y-m-d H:i:s");
        if ($contact->save()) {
            return $contact;
        } else {
            return abort(501);
        }
    }
}
