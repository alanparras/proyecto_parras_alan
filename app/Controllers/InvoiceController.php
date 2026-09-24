<?php

namespace App\Controllers;

use App\Models\VentaModel;

class InvoiceController extends BaseController
{
    // Muestra la factura en pantalla
    public function show($idVenta)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $ventaModel = new VentaModel();
        $venta = $ventaModel->getVentaConUsuario($idVenta);

        $esDueño = ($venta !== null && $venta['id_user'] == session()->get('userId'));
        $esAdmin = (session()->get('userProfile') == 1);

        if ($venta === null || (!$esDueño && !$esAdmin)) {
            return redirect()->to(base_url('myPurchases'));
        }

        $venta['detalle'] = $ventaModel->getDetalleConProductos($idVenta);

        $data = [
            'titulo' => 'Prime Shoes | Factura #' . $idVenta,
            'venta'  => $venta,
        ];

        return view('front/invoice', $data);
    }

    // Genera y descarga el PDF
    public function download($idVenta)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $ventaModel = new VentaModel();
        $venta = $ventaModel->getVentaConUsuario($idVenta);

        $esDueño = ($venta !== null && $venta['id_user'] == session()->get('userId'));
        $esAdmin = (session()->get('userProfile') == 1);

        if ($venta === null || (!$esDueño && !$esAdmin)) {
            return redirect()->to(base_url('myPurchases'));
        }

        $venta['detalle'] = $ventaModel->getDetalleConProductos($idVenta);

        $html = view('front/invoice_pdf', ['venta' => $venta]);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('factura_' . $idVenta . '.pdf', ['Attachment' => true]);
    }
}