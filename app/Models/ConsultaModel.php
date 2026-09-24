<?php
namespace App\Models;
use CodeIgniter\Model;

class ConsultaModel extends Model{
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['nombre', 'email', 'consulta', 'id_user'];

    //dates
    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = false;

    public function getTodasConPerfil()
    {
        return $this->select('consultas.*, perfiles.descripcion as perfil_descripcion')
                    ->join('users', 'users.id_user = consultas.id_user', 'left')
                    ->join('perfiles', 'perfiles.id_perfil = users.id_perfil', 'left')
                    ->findAll();
    }
}