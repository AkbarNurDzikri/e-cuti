<?php

class Dashboard_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPermohonanCuti($data)
    {
        $this->db->query("SELECT COUNT(cuti_out) FROM `transcuti` WHERE karyawan_id = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getAllCutiTahunan($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 5");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getAllCutiKhusus($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 6");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiTahunanAcc($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 5 AND status = 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiTahunanAccHari($data)
    {
        $this->db->query("SELECT SUM(cuti_out) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 5 AND status = 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiKhususAcc($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 6 AND status = 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiKhususAccHari($data)
    {
        $this->db->query("SELECT SUM(cuti_out) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 6 AND status = 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiTahunanOnProgress($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 5 AND status > 1 AND status < 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiTahunanOnProgressHari($data)
    {
        $this->db->query("SELECT SUM(cuti_out) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 5 AND status > 1 AND status < 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiKhususOnProgress($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 6 AND status > 1 AND status < 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiKhususOnProgressHari($data)
    {
        $this->db->query("SELECT SUM(cuti_out) FROM `transcuti` WHERE karyawan_id = :data AND cuti_id = 6 AND status > 1 AND status < 7");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiTahunanRejected($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND status = 30 AND cuti_id = 5 OR karyawan_id = :data AND status = 40 AND cuti_id = 5 OR karyawan_id = :data AND status = 50 AND cuti_id = 5 OR karyawan_id = :data AND status = 60 AND cuti_id = 5 OR karyawan_id = :data AND status = 70 AND cuti_id = 5");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiTahunanRejectedHari($data)
    {
        $this->db->query("SELECT SUM(cuti_out) FROM `transcuti` WHERE karyawan_id = :data AND status = 30 AND cuti_id = 5 OR karyawan_id = :data AND status = 40 AND cuti_id = 5 OR karyawan_id = :data AND status = 50 AND cuti_id = 5 OR karyawan_id = :data AND status = 60 AND cuti_id = 5 OR karyawan_id = :data AND status = 70 AND cuti_id = 5");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiKhususRejected($data)
    {
        $this->db->query("SELECT COUNT(cuti_id) FROM `transcuti` WHERE karyawan_id = :data AND status = 30 AND cuti_id = 6 OR karyawan_id = :data AND status = 40 AND cuti_id = 6 OR karyawan_id = :data AND status = 50 AND cuti_id = 6 OR karyawan_id = :data AND status = 60 AND cuti_id = 6 OR karyawan_id = :data AND status = 70 AND cuti_id = 6");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getCutiKhususRejectedHari($data)
    {
        $this->db->query("SELECT SUM(cuti_out) FROM `transcuti` WHERE karyawan_id = :data AND status = 30 AND cuti_id = 6 OR karyawan_id = :data AND status = 40 AND cuti_id = 6 OR karyawan_id = :data AND status = 50 AND cuti_id = 6 OR karyawan_id = :data AND status = 60 AND cuti_id = 6 OR karyawan_id = :data AND status = 70 AND cuti_id = 6");
        $this->db->bind('data', $data);
        return $this->db->single();
    }
}
