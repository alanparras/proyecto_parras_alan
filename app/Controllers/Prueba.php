<?php

namespace App\Controllers;

class Prueba extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Prueba'];
        return view('pruebas/prueba', $data);
    }
}