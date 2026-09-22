<?php

namespace App\Controllers;

use App\Models\ConsultaModel;
use App\Models\UsersModel;

class Contact extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Contacto'];
        return view('front/contact', $data);
    }

    public function send()
    {
        $rules = [ // validaciones del formulario
            'consulta' => 'required|max_length[500]|min_length[10]',
        ];

        if (!$this->validate($rules)) { //si no se cumplen las validaciones

            //regresa a la pagina anterior con todos los campos que el usuario introdujo, ademas se muestra una lista de los errores que tuvo el mismo
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $consultaModel = new ConsultaModel();

        $post = $this->request->getPost(['nombre', 'email', 'consulta']);

        if (session()->get('logged_in')) {
            $userModel = new UsersModel();
            $usuario = $userModel->find(session()->get('userId'));

            $consultaModel->insert([
                'nombre' => $usuario['nombre'] . ' ' . $usuario['apellido'],
                'email' => $usuario['email'],
                'consulta' => $post['consulta'],
            ]);
        } else {
            $consultaModel->insert([
                'nombre' => $post['nombre'],
                'email' => $post['email'],
                'consulta' => $post['consulta'],
            ]);
        }

        session()->setFlashdata('success', 'Consulta enviada con éxito.');
        return redirect()->to('contact'); //configuar ventana emergente

    }
}
