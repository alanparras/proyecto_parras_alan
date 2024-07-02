<?php

namespace App\Controllers;
use App\Models\ProductsModel;

class Catalogue extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Productos'];

        $productosModel = new ProductsModel();
        $data['productos'] = $productosModel->findAll();

        return view('front/catalogue', $data);
    }
}