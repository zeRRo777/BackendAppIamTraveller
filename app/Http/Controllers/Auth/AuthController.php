<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use function abort;
use function dd;
use function redirect;
use function route;
use function view;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.loginForm');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::guard('admin')->attempt($data))
        {
            return redirect(route('admin.index'));
        }

        return redirect(route('login'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('login'));
    }

}
