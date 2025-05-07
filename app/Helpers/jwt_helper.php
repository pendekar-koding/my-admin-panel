<?php


use Firebase\JWT\JWT;

function generateJWT($user)
{
    $key = env('JWT_SECRET');
    $payload = [
        'iss' => "pendekarkoding20@gmail.com",
        'uid' => $user['id'],
        'iat' => time(),
        'exp' => time() + (60 * 60),
        'username' => $user['username'],
    ];

    return JWT::encode($payload, $key, 'HS256');
}