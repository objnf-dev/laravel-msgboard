<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        /*
        $client = new Client();
        $respond = $client -> post('/api/get_token', [
            "email" => $request->only('email'),
            "password" => $request->only('password')
        ]);
        if($respond->getBody()['status'] == "false")
            Auth::logout();
        $tokenType = json_decode($respond->getBody()->getContents(),true)['data']['token_type'];
        $accessToken = json_decode($respond->getBody()->getContents(),true)['data']['access_token'];
        $refreshToken = json_decode($respond->getBody()->getContents(),true)['data']['refresh_token'];
        $expireTime = (int)json_decode($respond->getBody()->getContents(),true)['data']['expire_time'];
        cookie('Authorization', $tokenType." ".$accessToken, $expireTime, "/", config("app.url"), false, true, false, null);
        cookie('RefreshToken', $refreshToken, 0, "/", config("app.url"), false, true, false, null);
        */
        var_dump($request);
    }
}
