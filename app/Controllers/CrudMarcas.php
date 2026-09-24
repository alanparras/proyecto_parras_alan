<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MarcasModel;

class CrudMarcas extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Marcas'];

        $marcasModel = new MarcasModel();
        $data['marcas'] = $marcasModel->findAll();

        return view('front/crudMarcas/crudMarcas', $data);
    }

    public function new()
    {
        $data = ['titulo' => 'Prime Shoes | Agregar Marca'];

        return view('front/crudMarcas/addMarca', $data);
    }

    public function create()
    {
        $rules = [
            'nombre_marca' => 'required|max_length[20]|is_unique[marcas.nombre_marca]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $marcasModel = new MarcasModel();
        $post = $this->request->getPost(['nombre_marca']);

        $marcasModel->insert([
            'nombre_marca' => trim($post['nombre_marca']),
            'activo'       => 1,
        ]);

        session()->setFlashdata('success', 'Marca agregada con éxito');
        return redirect()->to('crudMarcas');
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->to('crudMarcas');
        }

        $marcasModel = new MarcasModel();
        $marca = $marcasModel->find($id);

        if ($marca === null) {
            return redirect()->to('crudMarcas');
        }

        $data = [
            'titulo' => 'Prime Shoes | Editar Marca',
            'marca'  => $marca,
        ];

        return view('front/crudMarcas/editMarca', $data);
    }

    public function update($id)
    {
        $marcasModel = new MarcasModel();
        $marcaActual = $marcasModel->find($id);

        if ($marcaActual === null) {
            return redirect()->to('crudMarcas');
        }

        $rules = [
            'nombre_marca' => "required|max_length[20]|is_unique[marcas.nombre_marca,id_marca,{$id}]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombre_marca']);

        $marcasModel->update($id, [
            'nombre_marca' => trim($post['nombre_marca']),
        ]);

        session()->setFlashdata('success', 'Marca actualizada con éxito');
        return redirect()->to('crudMarcas');
    }

    public function bajaMarca($id)
    {
        $marcasModel = new MarcasModel();
        $marcasModel->update($id, ['activo' => false]);

        session()->setFlashdata('success', 'La marca se ha dado de baja');
        return redirect()->to('crudMarcas');
    }

    public function altaMarca($id)
    {
        $marcasModel = new MarcasModel();
        $marcasModel->update($id, ['activo' => true]);

        session()->setFlashdata('success', 'La marca se ha dado de alta');
        return redirect()->to('crudMarcas');
    }
}