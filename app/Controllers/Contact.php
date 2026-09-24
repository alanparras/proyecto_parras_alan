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
        $rules = [
            'consulta' => 'required|max_length[500]|min_length[10]',
        ];

        if (!session()->get('logged_in')) {
            $rules['nombre'] = 'required|max_length[50]';
            $rules['email'] = 'required|valid_email|max_length[100]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $consultaModel = new ConsultaModel();
        $post = $this->request->getPost(['nombre', 'email', 'consulta']);

        if (session()->get('logged_in')) {
            $userModel = new UsersModel();
            $usuario = $userModel->find(session()->get('userId'));

            $consultaModel->insert([
                'nombre'   => $usuario['nombre'] . ' ' . $usuario['apellido'],
                'email'    => $usuario['email'],
                'consulta' => $post['consulta'],
                'id_user'  => $usuario['id_user'],
            ]);
        } else {
            $consultaModel->insert([
                'nombre'   => $post['nombre'],
                'email'    => $post['email'],
                'consulta' => $post['consulta'],
                'id_user'  => null,
            ]);
        }

        session()->setFlashdata('success', 'Consulta enviada con éxito.');
        return redirect()->to('contact');
    }
}
