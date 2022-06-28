<?php

class Auth_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function validasi($data)
    {
        $this->db->query("SELECT * FROM `user` WHERE `username` = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getUser($data)
    {
        $this->db->query("SELECT m.id AS id_user, jk.jenkel AS gender, m.nama AS nama_user, a1.nama AS atasan1, a2.nama AS atasan2, a3.nama AS atasan3, a4.nama AS atasan4, a5.nama AS atasan5, d.nama_dept, j.nama_jabatan FROM `group` AS g INNER JOIN karyawan AS m ON g.karyawan_id = m.id INNER JOIN karyawan AS jk ON g.karyawan_id = jk.id LEFT JOIN karyawan AS a1 ON g.atasan_1 = a1.id LEFT JOIN karyawan AS a2 ON g.atasan_2 = a2.id LEFT JOIN karyawan AS a3 ON g.atasan_3 = a3.id LEFT JOIN karyawan AS a4 ON g.atasan_4 = a4.id LEFT JOIN karyawan AS a5 ON g.atasan_5 = a5.id INNER JOIN dept AS d ON g.dept_id = d.id INNER JOIN jabatan AS j ON g.jabatan_id = j.id INNER JOIN jabatan AS jd ON g.jabatan_id = jd.id INNER JOIN user ON g.karyawan_id = user.karyawan_id WHERE user.username = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function check($data)
    {
        $this->db->query("SELECT * FROM `user` WHERE `karyawan_id` = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getAll()
    {
        $id = $_SESSION['user']['id_user'];
        $this->db->query("SELECT u.*, k.nama FROM `user` AS u INNER JOIN karyawan AS k ON u.karyawan_id = k.id WHERE u.karyawan_id = $id");
        return $this->db->resultSet();
    }

    public function update($data)
    {
        // var_dump($_POST);
        // exit;
        $query = "UPDATE user SET
            karyawan_id = :karyawan_id,
            username = :username,
            password = :password,
            created_at = :created_at,
            updated_at = :updated_at,
            created_by = :created_by,
            updated_by = :updated_by
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('karyawan_id', $data['karyawan_id']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('created_by', $data['karyawan_id']);
        $this->db->bind('updated_by', $data['karyawan_id']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
