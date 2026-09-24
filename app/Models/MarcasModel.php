<?php
namespace App\Models;
use CodeIgniter\Model;

class MarcasModel extends Model{
    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['nombre_marca', 'activo'];

    //dates
    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = false;

}