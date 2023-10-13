<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Traits\ApiResponser;

class ConfirmablePasswordController extends Controller
{
    use ApiResponser;

    /**
     * Show the confirm password view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function user_page_access(Request $request)
    {

        if (! Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $request->params['password'],
        ])) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Wrong Password',
            ], 500);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Login Success',
        ], 200);

    }
}
