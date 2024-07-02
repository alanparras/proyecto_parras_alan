<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Inicio'];
        return view('front/login', $data);
    }

    public function auth()
    {
        $rules = [
            'user' => 'required',
            'pass'=> 'required',
        ];

        if(!$this->validate($rules)){ //si no se cumplen las validaciones

            //regresa a la pagina anterior con todos los campos que el usuario introdujo, ademas se muestra una lista de los errores que tuvo el mismo
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['user', 'pass']);

        $user = $userModel->validateUser($post['user'], $post['pass']);

        if($user !== null){
            $this->setSession($user);
            return redirect()->to(base_url('/'));
        }

        return redirect()->back()->withInput()->with('errors', 'El usuario y/o contraseña son incorrectos.');
    }

    private function setSession($userData){
        $data = [
            'logged_in' => true,
            'userId' => $userData['id_user'],
            'userProfile' => $userData['id_perfil'],
            'userName' => $userData['nombre'],
        ];

        $this->session->set($data);
    }

    public function logout(){
        if($this->session->get('logged_in')){
            $this->session->destroy();
        }

        return redirect()->to(base_url());
    }

}