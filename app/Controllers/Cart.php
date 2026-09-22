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

    public function index()
    {
        // Evita que el navegador muestre una versión cacheada del carrito
        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $this->response->setHeader('Pragma', 'no-cache');

        $data = ['titulo' => 'Prime Shoes | Carrito'];

        $cart = \Config\Services::Cart();
        $productosModel = new ProductsModel();

        $data['productos'] = $productosModel;
        $data['carrito'] = $cart;

        return view('front/carrito', $data);
    }

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
        $productos = $cart->contents();

        // Si no hay nada en el carrito, no se genera ninguna venta
        if (empty($productos)) {
            session()->setFlashdata('carritoVacio', 'Tu carrito está vacío.');
            return redirect()->to('carrito');
        }

        $ventaModel = new VentaModel();
        $ventaDetalleModel = new VentaDetalleModel();
        $productoModel = new ProductsModel();

        $idVenta = $ventaModel->insert([
            'id_user' => session()->get('userId'),
            'total_venta' => $cart->total(),
        ]);

        foreach ($productos as $producto) {
            $ventaDetalleModel->insert([
                'id_venta' => $idVenta,
                'id_producto' => $producto['id'],
                'qty' => $producto['qty'],
                'precio' => $producto['price']
            ]);

            $stockProducto = $productoModel->find($producto['id']);

            $productoModel->update(
                $producto['id'],
                ['stock' => $stockProducto['stock'] - $producto['qty']]
            );
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
