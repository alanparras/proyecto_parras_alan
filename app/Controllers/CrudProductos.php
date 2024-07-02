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

        // view('front/plantilla/head.php', $data);
        return view('front/crudProductos/crudProductos', $data);
    }

    public function new()
    {
        $data = ['titulo' => 'Prime Shoes | Agregar Producto'];

        $marcasModel = new MarcasModel();
        $productosModel = new ProductsModel();

        $data['marcas'] = $marcasModel->findAll();
        $data['productos'] = $productosModel->findAll();

        // view('front/plantilla/head.php', $data);
        return view('front/crudProductos/addProducto', $data);
    }

    public function create()
    {
        $rules = [ // validaciones del formulario
            'nombre' => 'required|max_length[200]',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required|min_length[1]', // fijate en la base de datos este registro y tambien los maximos de caracteres de los registros
            // 'id_marca' => 'required',
        ];

        if (!$this->validate($rules)) { //si no se cumplen las validaciones

            //regresa a la pagina anterior con todos los campos que el usuario introdujo, ademas se muestra una lista de los errores que tuvo el mismo
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $productosModel = new ProductsModel();
        $post = $this->request->getPost(['nombre', 'descripcion', 'precio', 'stock', 'marca']);

        $productosModel->insert([
            'nombre' => $post['nombre'],
            'descripcion' => trim($post['descripcion']),
            'precio' => trim($post['precio']),
            'stock' => trim($post['stock']),
            'id_marca' => trim($post['marca']),
            'activo' => 1,
        ]);

        $file = $this->request->getFile('fotoProducto');
        $idAgregado = $productosModel->getInsertID();

        if(!$file->isValid()){
            echo $file->getErrorString();
            exit;
        }

        if(!$file->hasMoved()){
            $ruta = ROOTPATH . 'assets/img/productos/'. $idAgregado;

            $file->move($ruta, 'principal.jpg');
        }
        

        session()->setFlashdata('success', 'Producto agregado con exito');
        return redirect()->to('crudProductos'); //configuar ventana emergente
    }

    public function bajaProducto($id)
    {
        $productosModel = new ProductsModel();

        $productosModel->update($id, ['activo' => false]);

        // $cart = \Config\Services::Cart();
        // $cart->remove($id);

        session()->setFlashdata('success', 'El producto se ha dado de baja');
        return redirect()->to('crudProductos'); //configuar ventana emergente
    }

    public function altaProducto($id)
    {
        $productosModel = new ProductsModel();

        $productosModel->update($id, ['activo' => true]);

        session()->setFlashdata('success', 'El producto se ha dado de alta');
        return redirect()->to('crudProductos'); //configuar ventana emergente
    }

    public function delete()
    {
    }
}
