<?php
namespace App\Models;
use CodeIgniter\Model;

class VentaModel extends Model{
    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['id_user', 'total_venta'];

    //dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = false;

}