<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\VentaDetalleModel;
use App\Models\VentaModel;
use App\Models\UsersModel;

class CrudVentas extends BaseController
{
    protected $helpers = ['form', 'url'];

    
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Ventas'];

        $ventaModel = new VentaModel();
        $ventaDetalleModel = new VentaDetalleModel();
        $productosModel = new ProductsModel();
        $usersModel = new UsersModel();

        $data['ventas'] = $ventaModel->findAll();
        $data['ventaDetalles'] = $ventaDetalleModel->findAll();
        $data['usuarios'] = $usersModel->findAll();
        $data['productos'] = $productosModel->findAll();

        // view('front/plantilla/head.php', $data);
        return view('front/crudVentas/crudVentas', $data);
    }
}
