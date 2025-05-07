<?php
namespace App\Controllers;

use App\Models\UserModel;

class users extends BaseController
{
    public function index()
    {
        return view('user/index');
    }

    public function getUsers()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return $this->response->setJSON([
            'data' => $users
        ]);
    }
}