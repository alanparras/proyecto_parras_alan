<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Registrarse'];
        return view('front/register', $data);
    }
}