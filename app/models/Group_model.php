<?php

class Group_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function store($data)
    {
        $query = "INSERT INTO `group` VALUES ('', :karyawan_id, :dept_id, :jabatan_id, :atasan_1, :atasan_2, :atasan_3, :atasan_4, :atasan_5, :created_at, :updated_at, :created_by, :updated_by)";

        $this->db->query($query);
        $this->db->bind('karyawan_id', $data['karyawan_id']);
        $this->db->bind('dept_id', $data['dept_id']);
        $this->db->bind('jabatan_id', $data['jabatan_id']);
        $this->db->bind('atasan_1', $data['atasan_1'] ?? null);
        $this->db->bind('atasan_2', $data['atasan_2'] ?? null);
        $this->db->bind('atasan_3', $data['atasan_3'] ?? null);
        $this->db->bind('atasan_4', $data['atasan_4'] ?? null);
        $this->db->bind('atasan_5', $data['atasan_5'] ?? null);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);
        $this->db->bind('created_by', null);
        $this->db->bind('updated_by', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAll()
    {
        $this->db->query("SELECT g.*, m.nama AS member, im.id AS id_member, a1.nama AS atasan1, a2.nama AS atasan2, a3.nama AS atasan3, a4.nama AS atasan4, a5.nama AS atasan5, d.nama_dept, j.nama_jabatan, jd.jobdesc AS jobdesc FROM `group` AS g INNER JOIN karyawan AS m ON g.karyawan_id = m.id LEFT JOIN karyawan AS im ON g.karyawan_id = im.id LEFT JOIN karyawan AS a1 ON g.atasan_1 = a1.id LEFT JOIN karyawan AS a2 ON g.atasan_2 = a2.id LEFT JOIN karyawan AS a3 ON g.atasan_3 = a3.id LEFT JOIN karyawan AS a4 ON g.atasan_4 = a4.id LEFT JOIN karyawan AS a5 ON g.atasan_5 = a5.id INNER JOIN dept AS d ON g.dept_id = d.id INNER JOIN jabatan AS j ON g.jabatan_id = j.id INNER JOIN jabatan AS jd ON g.jabatan_id = jd.id ORDER BY member ASC");

        return $this->db->resultSet();
    }

    public function getLeader($data)
    {
        $this->db->query("SELECT namkar.nama AS nama_leader, idk.id AS leader_id, g.karyawan_id AS member_id, dpt.nama_dept AS nama_dept, jbt.nama_jabatan AS nama_jabatan FROM karyawan AS namkar INNER JOIN `group` AS g ON namkar.id = g.karyawan_id INNER JOIN dept AS dpt ON g.dept_id = dpt.id INNER JOIN jabatan AS jbt ON g.jabatan_id = jbt.id INNER JOIN karyawan AS idk ON g.karyawan_id = idk.id WHERE dpt.nama_dept = :data AND jbt.nama_jabatan = 'Leader' ORDER BY nama_leader ASC");

        $this->db->bind('data', $data);
        return $this->db->resultSet();
    }

    public function getSupervisor($data)
    {
        $this->db->query("SELECT namkar.nama AS nama_supervisor, idk.id AS supervisor_id, g.karyawan_id AS member_id, dpt.nama_dept AS nama_dept, jbt.nama_jabatan AS nama_jabatan FROM karyawan AS namkar INNER JOIN `group` AS g ON namkar.id = g.karyawan_id INNER JOIN dept AS dpt ON g.dept_id = dpt.id INNER JOIN jabatan AS jbt ON g.jabatan_id = jbt.id INNER JOIN karyawan AS idk ON g.karyawan_id = idk.id WHERE dpt.nama_dept = :data AND jbt.nama_jabatan = 'Supervisor' ORDER BY nama_supervisor ASC");

        $this->db->bind('data', $data);
        return $this->db->resultSet();
    }

    public function getManager()
    {
        $this->db->query("SELECT namkar.nama AS nama_manager, idk.id AS manager_id, g.karyawan_id AS member_id, dpt.nama_dept AS nama_dept, jbt.nama_jabatan AS nama_jabatan FROM karyawan AS namkar INNER JOIN `group` AS g ON namkar.id = g.karyawan_id INNER JOIN dept AS dpt ON g.dept_id = dpt.id INNER JOIN jabatan AS jbt ON g.jabatan_id = jbt.id INNER JOIN karyawan AS idk ON g.karyawan_id = idk.id WHERE jbt.nama_jabatan = 'Manager' ORDER BY nama_manager ASC");

        return $this->db->resultSet();
    }

    public function getFactoryManager()
    {
        $this->db->query("SELECT namkar.nama AS nama_factory_manager, idk.id AS factory_manager_id, g.karyawan_id AS member_id, dpt.nama_dept AS nama_dept, jbt.nama_jabatan AS nama_jabatan FROM karyawan AS namkar INNER JOIN `group` AS g ON namkar.id = g.karyawan_id INNER JOIN dept AS dpt ON g.dept_id = dpt.id INNER JOIN jabatan AS jbt ON g.jabatan_id = jbt.id INNER JOIN karyawan AS idk ON g.karyawan_id = idk.id WHERE jbt.nama_jabatan = 'Factory Manager' ORDER BY nama_factory_manager ASC");

        return $this->db->resultSet();
    }

    public function getHrd()
    {
        $this->db->query("SELECT namkar.nama AS nama_hrd, idk.id AS hrd_id, g.karyawan_id AS member_id, dpt.nama_dept AS nama_dept, jbt.nama_jabatan AS nama_jabatan FROM karyawan AS namkar INNER JOIN `group` AS g ON namkar.id = g.karyawan_id INNER JOIN dept AS dpt ON g.dept_id = dpt.id INNER JOIN jabatan AS jbt ON g.jabatan_id = jbt.id INNER JOIN karyawan AS idk ON g.karyawan_id = idk.id WHERE dpt.nama_dept = 'HRD' AND jbt.nama_jabatan = 'Admin' ORDER BY nama_hrd ASC");

        return $this->db->resultSet();
    }

    public function duplicateValidation($data)
    {
        $this->db->query("SELECT * FROM `group` INNER JOIN karyawan ON group.karyawan_id = karyawan.id WHERE karyawan_id = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function update($data)
    {
        // var_dump($data['id']);
        // exit;
        $query = "UPDATE `group` SET
            karyawan_id = :karyawan_id,
            dept_id = :dept_id,
            jabatan_id = :jabatan_id,
            atasan_1 = :atasan_1,
            atasan_2 = :atasan_2,
            atasan_3 = :atasan_3,
            atasan_4 = :atasan_4,
            atasan_5 = :atasan_5,
            created_at = :created_at,
            updated_at = :updated_at,
            created_by = :created_by,
            updated_by = :updated_by
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('karyawan_id', $data['karyawan_id']);
        $this->db->bind('dept_id', $data['dept_id']);
        $this->db->bind('jabatan_id', $data['jabatan_id']);
        $this->db->bind('atasan_1', $data['atasan_1'] ?? null);
        $this->db->bind('atasan_2', $data['atasan_2'] ?? null);
        $this->db->bind('atasan_3', $data['atasan_3'] ?? null);
        $this->db->bind('atasan_4', $data['atasan_4'] ?? null);
        $this->db->bind('atasan_5', $data['atasan_5'] ?? null);
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
        $query = "DELETE FROM `group` WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function checkRelation($data)
    {
        $this->db->query("SELECT * FROM `group` INNER JOIN karyawan ON group.atasan_1 = karyawan.id WHERE atasan_1 = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }
}
