<?php

namespace App\Controllers;

class About_Us extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | ¿Quienes somos?'];
        return view('front/about_us', $data);
    }
}