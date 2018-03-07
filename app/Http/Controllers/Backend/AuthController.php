<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend/dashboard';

    public function showLoginForm()
    {
        // check login
        if (Auth::check()) {
            return redirect('backend/dashboard');
        }

        return view('backend.auth.login');
    }
}
