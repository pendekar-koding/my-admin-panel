<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {
        $username = session()->get('username');
        return view('dashboard', ['title' => 'Dashboard', 'user' => $username]);
    }

}