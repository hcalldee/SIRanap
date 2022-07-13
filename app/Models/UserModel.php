<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id', 'username', 'password', 'image'];
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('user');
    }
    function prep()
    {
        if ($this->findAll() == null) {
            $this->generate();
            $data = $this->findAll();
        } else {
            $data = $this->findAll();
        }
        return $data;
    }
    function joinSearch($column1 = null, $data1 = null, $column2 = null, $data2 = null)
    {
        $select = "user.id,`user`.`username`, `user`.`password`, `user`.`image` ,perawat.id_ruangan as ruangan, perawat.id as id_perawat, perawat.nama as perawat";
        $this->select($select);
        $this->join('perawat', "user.username = perawat.no_registrasi");
        if (($column1 && $data1) != null) {
            $this->having($column1, $data1);
            if (($column2 && $data2) != null) {
                $this->having($column2, $data2);
            }
            $query = $this->get();
            return $query->getResultArray();
        }
    }
    function userJoin($data, $admin = false)
    {
        if ($admin) {
            $this->select("`user`.`username`, `user`.`password`, `user`.`image`, `role`.`nama` AS role ,perawat.id_ruangan as ruangan, perawat.id as id_perawat, perawat.nama as perawat");
            $this->join('perawat', "user.username = perawat.no_registrasi");
            $this->join('userrole', "user.id = userrole.id_user");
            $this->join('role', "userrole.role_id = role.id");
            $this->having('username', $data['usr']);
            $this->having('password', $data['pass']);
            $query = $this->get();
            return $query->getResult();
        } else {
            $this->select("`user`.`username`, `user`.`password`, `user`.`image`, `role`.`nama` AS role");
            $this->join('userrole', "user.id = userrole.id_user");
            $this->join('role', "userrole.role_id = role.id");
            $this->having('username', $data['usr']);
            $this->having('password', $data['pass']);
            $query = $this->get();
            return $query->getResult();
        }
    }
    function create($data)
    {
        $perawat = new PerawatModel();
        $query = $this->db->table($this->table)->insert($data);
        $id = $this->where('username', $data['username'])->first();
        if ($query) {
            $update = $perawat->edit_column('no_registrasi', $data['username'], 'id_user', $id['id']);
            if ($update) {
                $data = true;
            } else {
                $data = false;
            }
        } else {
            $data = false;
        }
        return $data;
    }
    public function delete_by_id($id)
    {
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $this->db->query("alter table user auto_increment = 0");
        return $query;
    }
    function getAkunLog($data)
    {
        $res = [];
        $role = [];
        $i = 0;
        $status = false;
        $join  = $this->userJoin($data);
        if ($join != null) {
            foreach ($join as $j) {
                $role[$i] = $j->role;
                $i++;
                if ($j->role == 'Admin') {
                    $status = true;
                }
            }
            if ($status) {
                foreach ($join as $j) {
                    $res = [
                        'username' => $j->username,
                        'image' => $j->image,
                        'role' => $role,
                        'ruangan' => null,
                        'log_expire' => time() + (90 * 60),
                    ];
                }
            } else {
                $join  = $this->userJoin($data, true);
                foreach ($join as $j) {
                    $res = [
                        'username' => $j->username,
                        'image' => $j->image,
                        'role' => $role,
                        'ruangan' => $j->ruangan,
                        'id_perawat' => $j->id_perawat,
                        'nama' => $j->perawat,
                        'log_expire' => time() + (90 * 60),
                    ];
                }
            }
            return $res;
        } else {
            return false;
        }
    }
    function search($column, $data)
    {
        $data = $this->where($column, $data)->first();
        $data['perawat'] = $this->search_perawat($data['username']);

        return $data;
    }
    function search_perawat($data)
    {
        $perawat = new PerawatModel();
        $perawat = $perawat->search2('no_registrasi', $data);
        $data = $perawat['nama'];
        return $data;
    }
    function getPerawatUnactive()
    {
        $perawatModel = new PerawatModel();
        $data = $perawatModel->where('id_user', null)->findAll();
        return $data;
    }
    function generate()
    {
        $perawatModel = new PerawatModel();
        $dataPerawat = $perawatModel->findAll();
        $this->insert($this->admin());
        $i = 2;
        foreach ($dataPerawat as $dat) {
            $insert = $this->insert([
                'username' => $dat['no_registrasi'],
                'password' => md5($dat['no_registrasi']),
                'image' => 'default.jpg'
            ]);
            if ($insert) {
                $data = $perawatModel->search2('no_registrasi', $dat['no_registrasi']);
                $id = $data['id'];
                $update = $perawatModel->update($id, [
                    'id_user' => $i
                ]);
                $i++;
                if (!$update) {
                    echo '<pre>';
                    print_r($this->errors());
                    echo '</pre>';
                }
            } else {
                echo '<pre>';
                print_r($this->errors());
                echo '</pre>';
            }
        }
    }

    function admin()
    {
        $data = [
            'username' => 'admin',
            'password' => md5('123'),
            'image' => 'default.jpg'
        ];
        return $data;
    }

    function drop()
    {
        $db = \Config\Database::connect();
        $data = $db->query("delete from user");
        if ($data) {
            $data = $db->query("alter table user auto_increment = 0");
        }
    }

    function count($data)
    {
        // $sql = "SELECT * FROM user WHERE user.username = '?' AND user.password = '?'";
        // $query = $this->query($sql, $data['usr'], $data['pass']);
        $this->select("`user`.`username`, `user`.`password`");
        $this->where('username', $data['usr']);
        $this->where('password', $data['pass']);
        $query = $this->get();
        return $query->resultID;
    }

    function edit($data)
    {
        $sql = "UPDATE user SET `password` = " . "'" . $data['pass'] . "'" . " WHERE `username` = '"  . $data['usr'] . "'";
        return $this->query($sql);
    }
}
