<?php

namespace App\Controllers;


use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $this->firstSaveAdmin();
        return view('auth/login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user!== null && password_verify($password, $user['password'])) {
            session()->set('isLoggedIn', true);
            session()->set('username', $username);
            session()->set('full_name', $user['full_name']);
            session()->set('email', $user['email']);
            session()->set('user_id', $user['id']);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Username atau password salah.');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }


    private function firstSaveAdmin()
    {
        $userModel = new UserModel();
        if ($userModel->countAll() == 0) {
            $userModel->insert([
                'full_name'=> 'Administrator',
                'username' => 'admin',
                'password' => password_hash('admin@123', PASSWORD_DEFAULT),
                'email'=>'admin@admin.com',
            ]);
        }
    }
}