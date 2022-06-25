<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('main.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->only(['email', 'password']), $request->boolean('remember'))) {
            $user = Auth::user();

            return redirect()->route('user.profile')->with('success',sprintf(
                'С возвращением %s',
                $user->name
            ));
        }
    }
}
