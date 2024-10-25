<?php 
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password'];

    public function loginBD($username, $password)
    {
        // La contraseña debería estar encriptada, si es el caso, reemplaza la lógica
        return $this->where(['email' => $username, 'password' => $password])->first();
    }

    public function permisosMenu($id)
    {
        $builder = $this->db->table('menu_sistema as m');
        $builder->select('m.id as id, m.descripcion as descripcion, m.imagen as imagen, m.url as url, p.estatus as estatus');
        $builder->join('permisosmenu as p', 'm.id = p.id_menu');
        $builder->where('p.id_usuario', $id);
        $builder->where('p.estatus', 0);
        $builder->orderBy('m.ordenamiento', 'asc');
        
        $query = $builder->get();
        
        return $query->getNumRows() > 0 ? ['permisos' => $query->getResultArray()] : ['permisos' => [['id' => 'Error']]];
    }
}
