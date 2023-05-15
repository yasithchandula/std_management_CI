<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Firebase\JWT\JWT;

class JWTController extends BaseController
{
    public function index()
    {
        $user=null;
        session()->set('user',1);

        $key = getenv('JWT_SECRET');
        log_message('debug',$key);
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;

        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $user['username'],
        );
        
        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'message' => 'Login Succesful',
            'token' => $token
        ];

        log_message('alert',implode('',$response));
        
        return response($response, 200);
    }
}
