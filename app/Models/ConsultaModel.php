<?php
namespace App\Models;
use CodeIgniter\Model;

class ConsultaModel extends Model{
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['nombre', 'email', 'consulta'];

    //dates
    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = false;

}