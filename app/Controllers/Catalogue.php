<?php

namespace App\Controllers;
use App\Models\ProductsModel;

class Catalogue extends BaseController
{
    public function index()
    {
        $productosModel = new ProductsModel();

        $busqueda = $this->request->getGet('busqueda');

        $productosModel->where('activo', 1);

        if (!empty($busqueda)) {
            $productosModel->like('nombre', $busqueda);
        }

        $data = [
            'titulo'    => 'Prime Shoes | Productos',
            'productos' => $productosModel->paginate(9),
            'pager'     => $productosModel->pager,
            'busqueda'  => $busqueda,
        ];

        return view('front/catalogue', $data);
    }
}