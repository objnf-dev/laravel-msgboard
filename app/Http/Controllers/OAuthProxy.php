<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class OAuthProxy extends Controller
{
    public function get_access_code(){
        $client = new Client();
        $oauth_url = request() -> root() . '/oauth/token';
        $post_param = [
            'username' => request('email'),
            'password' => request('password'),
            'grant_type' => config('auth.oauth.client2.type'),
            'client_id' => config('auth.oauth.client2.id'),
            'client_secret' => config('auth.oauth.client2.secret'),
            'scope' => '*'
        ];

        $respond = $client -> request('POST', $oauth_url, ['form_params' => $post_param]);

        if($respond -> getStatusCode !== 401){
            return [
                'status' => true,
                'data' => json_decode($respond->getBody()->getContents(), true)
            ];
        }
        return [
            'status' => false
        ];
    }


}
