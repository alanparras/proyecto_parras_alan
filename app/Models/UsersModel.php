<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['nombre', 'apellido', 'dni', 'user', 'email', 'pass', 'id_perfil', 'active'];

    //dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = false;

    public function validateUser($user, $pass)
    {
        $user = $this->where(['user' => $user, 'active' => 1])->first();

        if($user && password_verify($pass, $user['pass'])){
            return $user;
        }
        return null;
    }

    public function contarAdminsActivos($idExcluir = null)
    {
        $builder = $this->where('id_perfil', 1) // ajustá el 1 si tu id de perfil admin es otro
                         ->where('active', 1);

        if ($idExcluir !== null) {
            $builder->where('id_user !=', $idExcluir);
        }

        return $builder->countAllResults();
    }
}