<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\UsersModel;

class CrudUsers extends BaseController
{
    protected $helpers = ['form', 'url'];
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Usuarios'];

        $perfilesModel = new ProfileModel();
        $userModel = new UsersModel();

        $data['perfiles'] = $perfilesModel->findAll();
        $data['usuarios'] = $userModel->findAll();

        // view('front/plantilla/head.php', $data);
        return view('front/crudUsers/crudUsers', $data);
    }

    public function new()
    {
        $data = ['titulo' => 'Prime Shoes | Agregar Usuario'];
        $perfilesModel = new ProfileModel();
        $perfiles['perfiles'] = $perfilesModel->findAll();

        view('front/plantilla/head.php', $data);
        return  view('front/crudUsers/addUser', $perfiles);
    }

    public function create()
    {
        $rules = [ // validaciones del formulario
            'nombre' => 'required|max_length[50]',
            'apellido' => 'required|max_length[50]',
            'dni' => 'required|max_length[8]',
            'user' => 'required|max_length[30]|is_unique[users.user]', // fijate en la base de datos este registro y tambien los maximos de caracteres de los registros
            'email' => 'required|max_length[100]|valid_email|is_unique[users.email]',
            'perfil' => 'required|is_not_unique[perfiles.id_perfil]', //[users.id_perfil]
            'pass' => 'required|max_length[50]|min_length[5]',
            'repass' => 'matches[pass]',
        ];

        if (!$this->validate($rules)) { //si no se cumplen las validaciones

            //regresa a la pagina anterior con todos los campos que el usuario introdujo, ademas se muestra una lista de los errores que tuvo el mismo
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['nombre', 'apellido', 'dni', 'user', 'email', 'pass', 'id_perfil']);

        $userModel->insert([
            'nombre' => $post['nombre'],
            'apellido' => trim($post['apellido']),
            'dni' => trim($post['dni']),
            'user' => trim($post['user']),
            'email' => trim($post['email']),
            'pass' => trim(password_hash($post['pass'], PASSWORD_DEFAULT)),
            'id_perfil' => $post['id_perfil'], //como es un array arranca con 0 entonces no manda mal los datos
            'active' => 1,
        ]);

        session()->setFlashdata('success', 'Usuario agregado con exito');
        return redirect()->to('crudUsers'); //configuar ventana emergente
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->to('crudUsers');
        }


        $data = ['titulo' => 'Prime Shoes | Agregar Usuario'];
        $perfilesModel = new ProfileModel();
        $usersModel = new UsersModel();

        $data['perfiles'] = $perfilesModel->findAll();
        $data['usuario'] = $usersModel->find($id);

        // view('front/plantilla/head.php', $data);
        return  view('front/crudUsers/editUser', $data);
    }
    public function update($id)
    {
        $rules = [ // validaciones del formulario
            'nombre' => 'required|max_length[50]',
            'apellido' => 'required|max_length[50]',
            'dni' => 'required|max_length[8]',
            'user' => 'required|max_length[30]|is_unique[users.user]', // fijate en la base de datos este registro y tambien los maximos de caracteres de los registros
            'email' => 'required|max_length[100]|valid_email|is_unique[users.email]',
            'perfil' => 'required|is_not_unique[perfiles.id_perfil]', //[users.id_perfil]
        ];

        if (!$this->validate($rules)) { //si no se cumplen las validaciones

            //regresa a la pagina anterior con todos los campos que el usuario introdujo, ademas se muestra una lista de los errores que tuvo el mismo
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['nombre', 'apellido', 'dni', 'user', 'email', 'id_perfil']);

        $userModel->update($id,[
            'nombre' => $post['nombre'],
            'apellido' => trim($post['apellido']),
            'dni' => trim($post['dni']),
            'user' => trim($post['user']),
            'email' => trim($post['email']),
            'id_perfil' => $post['id_perfil'], //como es un array arranca con 0 entonces no manda mal los datos
        ]);

        session()->setFlashdata('success', 'Usuario agregado con exito');
        return redirect()->to('crudUsers'); //configuar ventana emergente
    }

    public function bajaUsuario($id)
    {
        $userModel = new UsersModel();
        $usuario= $userModel->find($id);

        $userModel->update($id, ['active' => false]);
        
        session()->setFlashdata('success', 'El usuario se ha dado de baja');
        return redirect()->to('crudUsers'); //configuar ventana emergente
    }

    public function altaUsuario($id)
    {
        $userModel = new UsersModel();
        $usuario= $userModel->find($id);

        $userModel->update($id, ['active' => true]);
        
        session()->setFlashdata('success', 'El usuario se ha dado de alta');
        return redirect()->to('crudUsers'); //configuar ventana emergente
    }
    
    public function delete()
    {
    }
}
