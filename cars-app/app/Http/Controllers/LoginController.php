<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $input = $request->only('email', 'password');
        if (Auth::attempt($input)) {
            return redirect('/dashboard');
        } else {
            return Redirect::back()->withErrors("whoops");
        };
    }
}
