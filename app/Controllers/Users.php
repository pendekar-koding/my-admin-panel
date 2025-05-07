<?php
namespace App\Controllers;

class users extends BaseController
{
    public function index()
    {
        return view('users');
    }
}