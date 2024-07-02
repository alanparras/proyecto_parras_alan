<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductsModel extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'stock', 'id_marca', 'activo'];

    //dates
    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = false;

}