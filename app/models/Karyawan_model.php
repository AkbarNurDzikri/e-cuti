<?php

class Karyawan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function store($data)
    {
        $query = "INSERT INTO karyawan VALUES ('', :pendidikan_id, :jurusan_id, :nrp, :nik, :nama, :tempat_lahir, :tgl_lahir, :jenkel, :agama, :alamat, :status_perkawinan, :no_kk, :no_hp, :email, :ibu_kandung, :ayah_kandung, :bpjs_tk, :bpjs_ks, :npwp, :hak_cuti_tahunan, :created_at, :updated_at, :created_by, :updated_by)";

        $this->db->query($query);
        $this->db->bind('pendidikan_id', $data['pendidikan_id']);
        $this->db->bind('jurusan_id', $data['jurusan_id']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenkel', $data['jenkel']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('status_perkawinan', $data['status_perkawinan']);
        $this->db->bind('no_kk', $data['no_kk']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('ibu_kandung', $data['ibu_kandung']);
        $this->db->bind('ayah_kandung', $data['ayah_kandung']);
        $this->db->bind('bpjs_tk', $data['bpjs_tk']);
        $this->db->bind('bpjs_ks', $data['bpjs_ks']);
        $this->db->bind('npwp', $data['npwp']);
        $this->db->bind('hak_cuti_tahunan', $data['hak_cuti_tahunan']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);
        $this->db->bind('created_by', null);
        $this->db->bind('updated_by', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAll()
    {
        $this->db->query("SELECT karyawan.*, pendidikan.nama_pendidikan, jurusan.nama_jurusan FROM karyawan INNER JOIN pendidikan ON karyawan.pendidikan_id = pendidikan.id INNER JOIN jurusan ON karyawan.jurusan_id = jurusan.id ORDER BY nama ASC");
        return $this->db->resultSet();
    }

    public function validasi($data)
    {
        $this->db->query("SELECT * FROM karyawan WHERE nama = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function update($data)
    {
        $query = "UPDATE karyawan SET
            pendidikan_id = :pendidikan_id,
            jurusan_id = :jurusan_id,
            nrp = :nrp,
            nik = :nik,
            nama = :nama,
            tempat_lahir = :tempat_lahir,
            tgl_lahir = :tgl_lahir,
            jenkel = :jenkel,
            agama = :agama,
            alamat = :alamat,
            status_perkawinan = :status_perkawinan,
            no_kk = :no_kk,
            no_hp = :no_hp,
            email = :email,
            ibu_kandung = :ibu_kandung,
            ayah_kandung = :ayah_kandung,
            bpjs_tk = :bpjs_tk,
            bpjs_ks = :bpjs_ks,
            npwp = :npwp,
            hak_cuti_tahunan = :hak_cuti_tahunan,
            created_at = :created_at,
            updated_at = :updated_at,
            created_by = :created_by,
            updated_by = :updated_by
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('pendidikan_id', $data['pendidikan_id']);
        $this->db->bind('jurusan_id', $data['jurusan_id']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenkel', $data['jenkel']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('status_perkawinan', $data['status_perkawinan']);
        $this->db->bind('no_kk', $data['no_kk']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('ibu_kandung', $data['ibu_kandung']);
        $this->db->bind('ayah_kandung', $data['ayah_kandung']);
        $this->db->bind('bpjs_tk', $data['bpjs_tk']);
        $this->db->bind('bpjs_ks', $data['bpjs_ks']);
        $this->db->bind('npwp', $data['npwp']);
        $this->db->bind('hak_cuti_tahunan', $data['hak_cuti_tahunan']);
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
        $query = "DELETE FROM karyawan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
