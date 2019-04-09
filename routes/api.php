<?php

use Illuminate\Http\Request;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get_token', function (Request $request) {
    $data = $request->only('email', 'password');

    $client = new Client();
    $oauth_url = request() -> root() . '/oauth/token';
    $post_param = [
        "grant_type" => config('auth.oauth.client2.type'),
        "client_id" => config('auth.oauth.client2.id'),
        "client_secret" => config('auth.oauth.client2.secret'),
        "scope" => "*",
        "username" => $data['email'],
        "password" => $data['password']
    ];

    $respond = $client -> post($oauth_url, ["form_params" => $post_param]);

    if($respond->getStatusCode() == 401)
    {
        return [
            "status" => "false"
        ];
    }

    return [
        "status" => "true",
        "data" => $respond->getBody()->getContents()
    ];
});
