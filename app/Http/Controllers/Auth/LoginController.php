<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    protected function authenticated(Request $request, $user)
    {
        $client = new Client();
        $send_data = [
            "grant_type" => config('auth.oauth.client2.type'),
            "client_id" => config('auth.oauth.client2.id'),
            "client_secret" => config('auth.oauth.client2.secret'),
            "scope" => "*",
            "username" => $request->only('email')['email'],
            "password" => $request->only('password')['password']
        ];
        $respond = $client -> post($request->root().'/oauth/token', ["form_params" => $send_data]);
        if($respond->getStatusCode() == 401)
        {
            Auth::logout();
            return redirect("/login",302);
        }
        $res_data = json_decode($respond->getBody()->getContents(), true);

        $tokenType = $res_data['token_type'];
        $accessToken = $res_data['access_token'];
        $refreshToken = $res_data['refresh_token'];
        $expireTime = (int)$res_data['expires_in'];
        $cookie1 = Cookie::create('Authorization', $tokenType." ".$accessToken, $expireTime, '*', config("app.url"), false, true, false, null);
        $cookie2 = Cookie::create('RefreshToken', $refreshToken, 0, "*", config("app.url"), false, true, false, null);
        return redirect('/',302)->withCookies([
            $cookie1,
            $cookie2
        ]);
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
