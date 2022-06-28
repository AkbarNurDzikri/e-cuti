<?php

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function store($data)
    {
        $query = "INSERT INTO user VALUES ('', :karyawan_id, :username, :password, :created_at, :updated_at, :created_by, :updated_by)";

        $this->db->query($query);
        $this->db->bind('karyawan_id', $data['karyawan_id']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);
        $this->db->bind('created_by', null);
        $this->db->bind('updated_by', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAll()
    {
        $this->db->query("SELECT u.*, k.nama FROM `user` AS u INNER JOIN karyawan AS k ON u.karyawan_id = k.id");
        return $this->db->resultSet();
    }

    public function validasi($data)
    {
        $this->db->query("SELECT * FROM user WHERE karyawan_id = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function update($data)
    {
        $query = "UPDATE user SET
            karyawan_id = :karyawan_id,
            username = :username,
            created_at = :created_at,
            updated_at = :updated_at,
            created_by = :created_by,
            updated_by = :updated_by
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('karyawan_id', $data['karyawan_id']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('created_by', null);
        $this->db->bind('updated_by', null);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($id)
    {
        $query = "DELETE FROM user WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
