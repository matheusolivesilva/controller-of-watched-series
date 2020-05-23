<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function index()
    {
        return view ('signin.index');
    }

    public function signin(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
           return redirect()
	       ->back()
	       ->withErrors('User or password are invalid');
	}

	return redirect()->route('list_series');
    }
}
