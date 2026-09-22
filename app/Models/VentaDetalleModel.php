<?php
namespace App\Models;
use CodeIgniter\Model;

class VentaDetalleModel extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id_detalle';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['id_venta', 'id_producto', 'qty', 'precio'];

    //dates
    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = false;

}