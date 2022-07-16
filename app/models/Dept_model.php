<?php

class Dept_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function store($data)
    {
        $query = "INSERT INTO dept VALUES ('', :nama_dept, :created_at, :updated_at, :created_by, :updated_by)";

        $this->db->query($query);
        $this->db->bind('nama_dept', $data['nama_dept']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);
        $this->db->bind('created_by', null);
        $this->db->bind('updated_by', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM dept");
        return $this->db->resultSet();
    }

    public function validasi($data)
    {
        $this->db->query("SELECT * FROM dept WHERE nama_dept = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function update($data)
    {
        $query = "UPDATE dept SET
            nama_dept = :nama_dept,
            created_at = :created_at,
            updated_at = :updated_at,
            created_by = :created_by,
            updated_by = :updated_by
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('nama_dept', $data['nama_dept']);
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
        $query = "DELETE FROM dept WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
