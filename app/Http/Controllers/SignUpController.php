<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class SignUpController extends Controller
{
    public function create()
    {
        return view('signup.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
	$data['password'] = Hash::make($data['password']);
	$user = User::create($data);

	Auth::login($user);

	return redirect()->route('list_series');
    }
}
