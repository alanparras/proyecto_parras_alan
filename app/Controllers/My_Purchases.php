<?php

namespace App\Controllers;
use App\Models\VentaModel;

class My_Purchases extends BaseController
{
    public function index()
    {
        $idUser = session()->get('userId');

        $ventaModel = new VentaModel();
        $ventas = $ventaModel->getComprasPorUsuario($idUser);

        // A cada venta le agrego su detalle de productos
        foreach ($ventas as &$venta) {
            $venta['detalle'] = $ventaModel->getDetalleConProductos($venta['id_venta']);
        }

        $data = [
            'titulo' => 'Prime Shoes | Mis Compras',
            'ventas' => $ventas,
        ];

        return view('front/myPurchases', $data);
    }
}