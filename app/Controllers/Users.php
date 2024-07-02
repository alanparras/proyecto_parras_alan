<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Registrarse'];
        return view('front/register', $data);
    }

    public function create()
    {
        $rules = [ // validaciones del formulario
            'nombre' => 'required|max_length[50]',
            'apellido' => 'required|max_length[50]',
            'dni' => 'required|max_length[8]',
            'user' => 'required|max_length[30]|is_unique[users.user]', // fijate en la base de datos este registro y tambien los maximos de caracteres de los registros
            'email' => 'required|max_length[100]|valid_email|is_unique[users.email]',
            'pass' => 'required|max_length[50]|min_length[5]',
            'repass' => 'matches[pass]',
        ];

        if(!$this->validate($rules)){ //si no se cumplen las validaciones

            //regresa a la pagina anterior con todos los campos que el usuario introdujo, ademas se muestra una lista de los errores que tuvo el mismo
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['nombre', 'apellido', 'dni', 'user', 'email', 'pass']);

        $userModel->insert([
            'nombre' => $post['nombre'],
            'apellido' => $post['apellido'],
            'dni' => $post['dni'],
            'user' => $post['user'],
            'email' => $post['email'],
            'pass' => password_hash($post['pass'], PASSWORD_DEFAULT),
            'id_perfil' => 2,
            'active' => 1,
        ]);
        
        session()->setFlashdata('success', 'Usuario registrado con exito');
        return redirect()->to('register'); //configuar ventana emergente

    }
}