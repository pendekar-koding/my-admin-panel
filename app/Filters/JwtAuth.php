<?php

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;

class JwtAuth implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (!$authHeader || !preg_match('/^Bearer\s+(.*?)$/', $authHeader, $matches)) {
            return service('response')
                ->setJSON(['message' => 'Token not provided'])
                ->setStatusCode(401);
        }

        $token = $matches[1];
        try {
            $decode = JWT::decode($token, getenv('JWT_SECRET'));
            $request->userData = $decode;
        } catch (\Exception $e) {
            return service('response')
                ->setJSON(['message' => 'Invalid or expired token', 'error' => $e->getMessage()])
                ->setStatusCode(401);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}