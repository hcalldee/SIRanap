<?php

namespace App\Models;

use CodeIgniter\Model;

class UserroleModel extends Model
{
    protected $table = 'userrole';
    protected $allowedFields = ['id', 'id_user', 'role_id'];
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('userrole');
    }

    function prep($search = false, $id = null)
    {
        if ($search) {
            $data = $this->role(true, 'ruangan', $id)->getResult();
        } else {
            $data = $this->role()->getResult();
        }
        return $data;
    }

    function getRole()
    {
        $role = new RoleModel();
        $i = 0;
        foreach ($role->prep() as $r) {
            if ($r['nama'] != "Admin") {
                $data[$i] = $r;
                $i++;
            }
        }
        return $data;
    }

    public function delete_by_id($id)
    {
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        if ($query) {
            $db = \Config\Database::connect();
            $data = $db->query("ALTER TABLE userrole AUTO_INCREMENT = 0");
            return $data;
        }
    }

    function search2($column, $data)
    {
        return $this->where($column, $data)->findAll();
    }

    function search($column, $data)
    {
        $data = $this->where($column, $data)->first();
        $user = new UserModel();
        $data = $user->search('id', $data['id_user']);
        return $data;
    }

    function create($data)
    {
        $query = $this->insert($data);
        return $query;
    }

    function role($search = false, $column = null, $data = null)
    {
        $select = "`userrole`.`id`, `user`.`username`, userrole.id_user, `role`.`nama` AS role, perawat.nama as perawat, perawat.id_ruangan as ruangan";
        if ($search) {
            $this->select($select);
            $this->join('user', "user.id = userrole.id_user");
            $this->join('role', "userrole.role_id = role.id");
            $this->join('perawat', "userrole.id_user = perawat.id_user");
            $this->having('role.nama', 'Ketua Tim');
            $this->having($column, $data);
            $query = $this->get();
        } else {
            $this->select($select);
            $this->join('user', "user.id = userrole.id_user");
            $this->join('role', "userrole.role_id = role.id");
            $this->join('perawat', "userrole.id_user = perawat.id_user");
            $query = $this->get();
        }
        return $query;
    }

    function getPerawat()
    {
        $perawat = new PerawatModel();
        $perawat->select("*");
        $perawat->join('user', "perawat.`id_user` = `user`.`id`");
        $query = $perawat->get();
        return $query->getResult();
    }
}
