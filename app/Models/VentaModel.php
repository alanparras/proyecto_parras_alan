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

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = false;

    public function getComprasPorUsuario($idUser)
    {
        return $this->where('id_user', $idUser)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getDetalleConProductos($idVenta)
    {
        return $this->db->table('ventas_detalle')
                    ->select('ventas_detalle.qty, ventas_detalle.precio, productos.id_producto, productos.nombre')
                    ->join('productos', 'productos.id_producto = ventas_detalle.id_producto')
                    ->where('ventas_detalle.id_venta', $idVenta)
                    ->get()
                    ->getResultArray();
    }

    public function getVentaConUsuario($idVenta)
    {
        return $this->select('ventas.*, users.nombre, users.apellido, users.dni, users.email')
                    ->join('users', 'users.id_user = ventas.id_user')
                    ->where('ventas.id_venta', $idVenta)
                    ->first();
    }
}