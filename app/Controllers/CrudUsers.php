<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\UsersModel;

class CrudUsers extends BaseController
{
    protected $helpers = ['form', 'url'];

    const PERFIL_ADMIN = 1; // ajustá si en tu tabla `perfiles` el admin tiene otro id

    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Usuarios'];

        $perfilesModel = new ProfileModel();
        $userModel = new UsersModel();

        $data['perfiles'] = $perfilesModel->findAll();
        $data['usuarios'] = $userModel->findAll();

        return view('front/crudUsers/crudUsers', $data);
    }

    public function new()
    {
        $data = ['titulo' => 'Prime Shoes | Agregar Usuario'];
        $perfilesModel = new ProfileModel();
        $data['perfiles'] = $perfilesModel->findAll();

        return view('front/crudUsers/addUser', $data);
    }

    public function create()
    {
        $rules = [
            'nombre'   => 'required|max_length[50]',
            'apellido' => 'required|max_length[50]',
            'dni'      => 'required|numeric|min_length[7]|max_length[8]|is_unique[users.dni]',
            'user'     => 'required|max_length[30]|is_unique[users.user]',
            'email'    => 'required|max_length[100]|valid_email|is_unique[users.email]',
            'perfil'   => 'required|is_not_unique[perfiles.id_perfil]',
            'pass'     => 'required|max_length[50]|min_length[5]',
            'repass'   => 'matches[pass]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['nombre', 'apellido', 'dni', 'user', 'email', 'pass', 'perfil']);

        $userModel->insert([
            'nombre'    => trim($post['nombre']),
            'apellido'  => trim($post['apellido']),
            'dni'       => trim($post['dni']),
            'user'      => trim($post['user']),
            'email'     => trim($post['email']),
            'pass'      => password_hash($post['pass'], PASSWORD_DEFAULT),
            'id_perfil' => $post['perfil'],
            'active'    => 1,
        ]);

        session()->setFlashdata('success', 'Usuario agregado con éxito');
        return redirect()->to('crudUsers');
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->to('crudUsers');
        }

        $perfilesModel = new ProfileModel();
        $usersModel = new UsersModel();

        $usuario = $usersModel->find($id);

        if ($usuario === null) {
            return redirect()->to('crudUsers');
        }

        $data = [
            'titulo'   => 'Prime Shoes | Editar Usuario',
            'perfiles' => $perfilesModel->findAll(),
            'usuario'  => $usuario,
        ];

        return view('front/crudUsers/editUser', $data);
    }

    public function update($id)
    {
        $userModel = new UsersModel();
        $usuarioActual = $userModel->find($id);

        if ($usuarioActual === null) {
            return redirect()->to('crudUsers');
        }

        $rules = [
            'nombre'   => 'required|max_length[50]',
            'apellido' => 'required|max_length[50]',
            'dni'      => "required|numeric|min_length[7]|max_length[8]|is_unique[users.dni,id_user,{$id}]",
            'user'     => "required|max_length[30]|is_unique[users.user,id_user,{$id}]",
            'email'    => "required|max_length[100]|valid_email|is_unique[users.email,id_user,{$id}]",
            'perfil'   => 'required|is_not_unique[perfiles.id_perfil]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombre', 'apellido', 'dni', 'user', 'email', 'perfil']);

        // Si se está bajando el perfil de administrador a otro perfil,
        // verificar que no sea el último admin activo del sistema
        if ($usuarioActual['id_perfil'] == self::PERFIL_ADMIN
            && $post['perfil'] != self::PERFIL_ADMIN
            && $usuarioActual['active'] == 1) {

            $adminsRestantes = $userModel->contarAdminsActivos($id);

            if ($adminsRestantes < 1) {
                session()->setFlashdata('errors', 'No se puede cambiar el perfil: debe quedar al menos un administrador activo en el sistema.');
                return redirect()->back()->withInput();
            }
        }

        $userModel->update($id, [
            'nombre'    => trim($post['nombre']),
            'apellido'  => trim($post['apellido']),
            'dni'       => trim($post['dni']),
            'user'      => trim($post['user']),
            'email'     => trim($post['email']),
            'id_perfil' => $post['perfil'],
        ]);

        session()->setFlashdata('success', 'Usuario actualizado con éxito');
        return redirect()->to('crudUsers');
    }

    public function bajaUsuario($id)
    {
        $userModel = new UsersModel();
        $usuario = $userModel->find($id);

        if ($usuario === null) {
            return redirect()->to('crudUsers');
        }

        // Si es admin, no se puede desactivar si es el último activo
        if ($usuario['id_perfil'] == self::PERFIL_ADMIN) {
            $adminsRestantes = $userModel->contarAdminsActivos($id);

            if ($adminsRestantes < 1) {
                session()->setFlashdata('errors', 'No se puede desactivar: debe quedar al menos un administrador activo en el sistema.');
                return redirect()->to('crudUsers');
            }
        }

        $userModel->update($id, ['active' => false]);

        session()->setFlashdata('success', 'El usuario se ha dado de baja');
        return redirect()->to('crudUsers');
    }

    public function altaUsuario($id)
    {
        $userModel = new UsersModel();
        $userModel->update($id, ['active' => true]);

        session()->setFlashdata('success', 'El usuario se ha dado de alta');
        return redirect()->to('crudUsers');
    }

    public function delete()
    {
    }
}