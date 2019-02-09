<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = Auth::user();

            if (!$user->verified) {
                Auth::logout();
                $success['message'] = 'You need to confirm your account. We have sent you an activation code, please check your email.';
                return response()->json($success, 200);
            }
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['user'] = $user;
            return response()->json($success, 200);
        }

        return $this->sendFailedLoginResponse($request);
    }
    
    public function logout()
    {
        $user = Auth::user();
        $user->token()->revoke();
        $user->token()->delete();

        return response()->json("Successfully Logout!!", 204);        
    }
}
