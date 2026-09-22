<?php
namespace App\Models;
use CodeIgniter\Model;

class ProfileModel extends Model{
    protected $table = 'perfiles';
    protected $primaryKey = 'id_perfil';
    protected $useAutoIncrement = true;
    // protected $resturnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['descripcion'];

    //dates
    protected $useTimestamps = false;
    
}