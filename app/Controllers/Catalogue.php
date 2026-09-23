<?php

namespace App\Controllers;
use App\Models\ProductsModel;

class Catalogue extends BaseController
{
    public function index()
    {
        $data = $this->buscarProductos();
        $data['titulo'] = 'Prime Shoes | Productos';

        return view('front/catalogue', $data);
    }

    private function buscarProductos()
    {
        $productosModel = new ProductsModel();

        $busqueda = $this->request->getGet('busqueda');

        $productosModel->where('activo', 1);

        if (!empty($busqueda)) {
            $productosModel->like('nombre', $busqueda);
        }

        $productosModel->orderBy('stock > 0 DESC, nombre', 'ASC', false);

        return [
            'productos' => $productosModel->paginate(9),
            'pager'     => $productosModel->pager,
            'busqueda'  => $busqueda,
        ];
    }
}