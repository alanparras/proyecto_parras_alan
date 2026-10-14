<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\VentaModel;
use App\Models\VentaDetalleModel;

class Cart extends BaseController
{
    public function __construct()
    {
        $cart = \Config\Services::Cart();
        $cart->contents();
    }

    private function sincronizarCarrito(): array
    {
        $cart = \Config\Services::Cart();
        $productosModel = new ProductsModel();
        $avisos = [];

        foreach ($cart->contents() as $item) {
            $producto = $productosModel->find($item['id']);

            if ($producto === null || !$producto['activo'] || $producto['stock'] <= 0) {
                $cart->remove($item['rowid']);
                $avisos[] = '"' . $item['name'] . '" ya no está disponible y se quitó del carrito.';
                continue;
            }

            if ($item['qty'] > $producto['stock']) {
                $cart->update(['rowid' => $item['rowid'], 'qty' => $producto['stock']]);
                $avisos[] = 'La cantidad de "' . $item['name'] . '" se ajustó a ' . $producto['stock'] . ' (stock disponible).';
            }
        }

        return $avisos;
    }

    public function index()
    {
        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $this->response->setHeader('Pragma', 'no-cache');

        $avisos = $this->sincronizarCarrito();

        $cart = \Config\Services::Cart();
        $productosModel = new ProductsModel();

        $data = [
            'titulo'    => 'Prime Shoes | Carrito',
            'productos' => $productosModel,
            'carrito'   => $cart,
            // avisos de esta carga + los que vengan de un intento de compra fallido
            'avisos'    => array_merge($avisos, session()->getFlashdata('avisosCarrito') ?? []),
        ];

        return view('front/carrito', $data);
    }
    // Ajusta el carrito al stock actual y devuelve los avisos para el usuario
    

    //Agregar al carrito
    public function add($id)
    {

        if ($id == null) {
            return redirect()->to('catalogue');
        }


        $productosModel = new ProductsModel();
        $producto = $productosModel->find($id);

        $cart = \Config\Services::Cart();
        $carrito = $cart->contents();

        if ($producto['stock'] > 0) {

            $productoCarrito = null;

            foreach ($carrito as $itemCarrito) {
                if ($itemCarrito['id'] == $producto['id_producto']) { //Busca entre los productos que hay en el carrito y compara los ids
                    $productoCarrito = $itemCarrito;
                }
            }

            if (empty($carrito) || ($productoCarrito == null)) { //Si el carrito esta vacio o Si el producto no esta en el carrito lo agrega.
                if ($producto['activo']) {
                    $cart->insert(array(
                        'id' => $producto['id_producto'],
                        'qty' => 1,
                        'price' => $producto['precio'],
                        'name' => $producto['nombre'],
                    ));
                }
            } 
            elseif ($producto['activo'] && ($productoCarrito['qty'] < $producto['stock'])) {
                $cart->insert(array(
                    'id' => $producto['id_producto'],
                    'qty' => 1,
                    'price' => $producto['precio'],
                    'name' => $producto['nombre'],
                ));
            }
        } 
        else {
            session()->setFlashdata('noStock', 'No hay más stock disponible.');
        }

        return redirect()->back();
    }

    //Comprar ahora
    public function checkout($id)
    {

        if ($id == null) {
            return redirect()->to('catalogue');
        }

        $productosModel = new ProductsModel();
        $producto = $productosModel->find($id);

        $cart = \Config\Services::Cart();
        $carrito = $cart->contents();

        if ($producto['stock'] > 0) {

            $productoCarrito = null;

            foreach ($carrito as $itemCarrito) {
                if ($itemCarrito['id'] == $producto['id_producto']) { //Busca entre los productos que hay en el carrito y compara los ids
                    $productoCarrito = $itemCarrito;
                }
            }

            if (empty($carrito) || ($productoCarrito == null)) { //Si el carrito esta vacio o Si el producto no esta en el carrito lo agrega.
                if ($producto['activo']) {
                    $cart->insert(array(
                        'id' => $producto['id_producto'],
                        'qty' => 1,
                        'price' => $producto['precio'],
                        'name' => $producto['nombre'],
                    ));
                }
            } 
            elseif ($producto['activo'] && ($productoCarrito['qty'] < $producto['stock'])) {
                $cart->insert(array(
                    'id' => $producto['id_producto'],
                    'qty' => 1,
                    'price' => $producto['precio'],
                    'name' => $producto['nombre'],
                ));
            }
        } 
        else {
            session()->setFlashdata('noStock', 'No hay más stock disponible.');
        }

        return redirect()->to('carrito');
    }

    //Actualiza el carrito
    public function update()
    {
        $cart = \Config\Services::Cart();

        // $id = $this->input->post('id');
        // $qty = $this->input->post('qty');
        $post = $this->request->getPost(['id', 'qty']);


        $cart->update(array(
            'rowid' => $post['id'],
            'qty' => $post['qty']
        ));
    }

    public function remove($id)
    {
        $cart = \Config\Services::Cart();

        $cart->remove($id);

        return redirect()->back();
    }
    public function buy()
    {
        $cart = \Config\Services::Cart();

        if (empty($cart->contents())) {
            session()->setFlashdata('carritoVacio', 'Tu carrito está vacío.');
            return redirect()->to('carrito');
        }

        // Revalidar contra el stock actual antes de registrar nada
        $avisos = $this->sincronizarCarrito();

        if (!empty($avisos)) {
            session()->setFlashdata('avisosCarrito', $avisos);
            return redirect()->to('carrito');
        }

        $productos = $cart->contents();

        $ventaModel = new VentaModel();
        $ventaDetalleModel = new VentaDetalleModel();
        $db = \Config\Database::connect();

        $db->transBegin();

        try {
            $idVenta = $ventaModel->insert([
                'id_user'     => session()->get('userId'),
                'total_venta' => $cart->total(),
            ]);

            foreach ($productos as $producto) {
                $ventaDetalleModel->insert([
                    'id_venta'    => $idVenta,
                    'id_producto' => $producto['id'],
                    'qty'         => $producto['qty'],
                    'precio'      => $producto['price'],
                ]);

                // Descuento atómico: solo se aplica si todavía hay stock suficiente
                $db->table('productos')
                ->set('stock', 'stock - ' . (int) $producto['qty'], false)
                ->where('id_producto', $producto['id'])
                ->where('stock >=', (int) $producto['qty'])
                ->update();

                if ($db->affectedRows() < 1) {
                    throw new \RuntimeException('Stock insuficiente para el producto ' . $producto['id']);
                }
            }

            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            log_message('error', 'Error al registrar la compra: ' . $e->getMessage());
            session()->setFlashdata('avisosCarrito', ['No se pudo completar la compra porque el stock cambió. Revisá tu carrito e intentá nuevamente.']);
            return redirect()->to('carrito');
        }

        $cart->destroy();

        return redirect()->to('thanks/' . $idVenta);
    }
    
    public function destroy()
    {
        $cart = \Config\Services::Cart();

        $cart->destroy();

        return redirect()->back();
    }
}
