<?php

namespace App\Controllers;

class Thanks extends BaseController
{
    public function index($idVenta = null)
    {
        $data = [
            'titulo'   => 'Prime Shoes | Gracias por su compra',
            'idVenta'  => $idVenta,
        ];
        return view('front/thanks', $data);
    }
}