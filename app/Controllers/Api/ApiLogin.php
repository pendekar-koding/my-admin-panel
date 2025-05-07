<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ApiLogin extends BaseController
{

    public function login()
    {
        $data = $this->request->getJSON();

        $username = $data->username ?? null;
        $password = $data->password ?? null;

        $userModel = new UserModel();

        $user = $userModel->where('username', $username)->first();
        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid username or password'
            ])->setStatusCode(401);
        }

        helper('jwt');
        $token = generateJWT($user);

        return $this->response
            ->setHeader('Authorization', 'Bearer ' . $token)
            ->setJSON([
            'status' => true,
            'message' => 'Login successfully',
        ])->setStatusCode(200);
    }
}