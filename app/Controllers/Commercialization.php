<?php

namespace App\Controllers;

class Commercialization extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Comercialización'];
        return view('front/commercialization', $data);
    }
}