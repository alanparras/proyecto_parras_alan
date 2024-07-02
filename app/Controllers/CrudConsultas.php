<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConsultaModel;

class CrudConsultas extends BaseController
{
    protected $helpers = ['form', 'url'];
    
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Consultas'];

        $consultaModel = new ConsultaModel();

        $data['consultas'] = $consultaModel->findAll();

        // view('front/plantilla/head.php', $data);
        return view('front/crudConsultas/crudConsultas', $data);
    }
}
