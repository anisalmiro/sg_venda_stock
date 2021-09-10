<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function login(Request $request) {
    	if($user = User::where('util_email', $request->util_email)->first() and Hash::check($request->util_senha, $user->util_senha)) {
    		Auth::login($user, (isset($request->util_lembrarsenha) and $request->util_lembrarsenha == "on") ? true : false);
			return redirect()->intended('home');
    	} else {
    		return redirect()->back()->withErrors([
    			'auth' => 'E-mail ou senha inválida'
    		]);
    	}
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
