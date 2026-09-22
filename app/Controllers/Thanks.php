<?php

namespace App\Controllers;

class Thanks extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Gracias por su compra'];
        return view('front/thanks', $data);
    }
}