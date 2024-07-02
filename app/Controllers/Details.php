<?php

namespace App\Controllers;
use App\Models\ProductsModel;

class Details extends BaseController
{
    public function index($id = null)
    {

        if ($id == null) {
            return redirect()->to('catalogue');
        }

        $data = ['titulo' => 'Prime Shoes | Detalle de Producto'];

        $productoModel = new ProductsModel();
        $data['producto'] = $productoModel->find($id);

        return view('front/details', $data);
    }
}