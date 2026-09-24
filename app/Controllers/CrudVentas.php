<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentaModel;

class CrudVentas extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        $ventaModel = new VentaModel();

        $data = [
            'titulo' => 'Prime Shoes | Ventas',
            'ventas' => $ventaModel->getTodasConUsuario(),
        ];

        return view('front/crudVentas/crudVentas', $data);
    }

    public function detalle($id = null)
    {
        if ($id == null) {
            return redirect()->to('crudVentas');
        }

        $ventaModel = new VentaModel();
        $venta = $ventaModel->getVentaConUsuario($id);

        if ($venta === null) {
            return redirect()->to('crudVentas');
        }

        $data = [
            'titulo'  => 'Prime Shoes | Detalle de Venta #' . $id,
            'venta'   => $venta,
            'detalle' => $ventaModel->getDetalleConProductos($id),
        ];

        return view('front/crudVentas/detalleVenta', $data);
    }
}