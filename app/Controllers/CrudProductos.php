<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\MarcasModel;

class CrudProductos extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Productos'];

        $marcasModel = new MarcasModel();
        $productosModel = new ProductsModel();

        $data['marcas'] = $marcasModel->findAll();
        $data['productos'] = $productosModel->findAll();

        return view('front/crudProductos/crudProductos', $data);
    }

    public function new()
    {
        $data = ['titulo' => 'Prime Shoes | Agregar Producto'];

        $marcasModel = new MarcasModel();
        $data['marcas'] = $marcasModel->findAll();

        return view('front/crudProductos/addProducto', $data);
    }

    public function create()
    {
        if (!$this->validate($this->reglasProducto())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $productosModel = new ProductsModel();
        $post = $this->request->getPost(['nombre', 'descripcion', 'precio', 'stock', 'marca']);

        $productosModel->insert([
            'nombre'      => trim($post['nombre']),
            'descripcion' => trim($post['descripcion']),
            'precio'      => trim($post['precio']),
            'stock'       => trim($post['stock']),
            'id_marca'    => trim($post['marca']),
            'activo'      => 1,
        ]);

        $idAgregado = $productosModel->getInsertID();

        $file = $this->request->getFile('fotoProducto');

        if ($file !== null && $file->isValid() && !$file->hasMoved()) {
            $ruta = ROOTPATH . 'assets/img/productos/' . $idAgregado;
            $file->move($ruta, 'principal.jpg');
        }

        session()->setFlashdata('success', 'Producto agregado con éxito');
        return redirect()->to('crudProductos');
    }

    public function edit($id)
    {
        $productosModel = new ProductsModel();
        $marcasModel = new MarcasModel();

        $producto = $productosModel->find($id);

        if ($producto === null) {
            return redirect()->to('crudProductos');
        }

        $data = [
            'titulo'   => 'Prime Shoes | Editar Producto',
            'producto' => $producto,
            'marcas'   => $marcasModel->findAll(),
        ];

        return view('front/crudProductos/editProducto', $data);
    }

    public function update($id)
    {
        $productosModel = new ProductsModel();

        $producto = $productosModel->find($id);

        if ($producto === null) {
            return redirect()->to('crudProductos');
        }

        if (!$this->validate($this->reglasProducto())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombre', 'descripcion', 'precio', 'stock', 'marca']);

        $productosModel->update($id, [
            'nombre'      => trim($post['nombre']),
            'descripcion' => trim($post['descripcion']),
            'precio'      => trim($post['precio']),
            'stock'       => trim($post['stock']),
            'id_marca'    => trim($post['marca']),
        ]);

        $file = $this->request->getFile('fotoProducto');

        // La imagen es opcional al editar: solo se reemplaza si se subió una nueva
        if ($file !== null && $file->isValid() && !$file->hasMoved()) {
            $ruta = ROOTPATH . 'assets/img/productos/' . $id;
            $file->move($ruta, 'principal.jpg');
        }

        session()->setFlashdata('success', 'Producto actualizado con éxito');
        return redirect()->to('crudProductos');
    }

    public function bajaProducto($id)
    {
        $productosModel = new ProductsModel();
        $productosModel->update($id, ['activo' => false]);

        session()->setFlashdata('success', 'El producto se ha dado de baja');
        return redirect()->to('crudProductos');
    }

    public function altaProducto($id)
    {
        $productosModel = new ProductsModel();
        $productosModel->update($id, ['activo' => true]);

        session()->setFlashdata('success', 'El producto se ha dado de alta');
        return redirect()->to('crudProductos');
    }

    public function delete()
    {
    }

    private function reglasProducto()
    {
        return [
            'nombre'      => 'required|max_length[200]',
            'descripcion' => 'required',
            'precio'      => 'required|decimal|greater_than[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
            'marca'       => 'required|is_not_unique[marcas.id_marca]',
        ];
    }
}