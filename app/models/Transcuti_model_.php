<?php

class Transcuti_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataCuti()
    {
        if ($_SESSION['user']['nama_dept'] == 'HRD') {
            $this->db->query("SELECT * FROM cuti");
            return $this->db->resultSet();
        } else {
            $this->db->query("SELECT * FROM cuti LIMIT 1");
            return $this->db->resultSet();
        }
    }

    public function upload()
    {
        $file_name = $_FILES['bukti_cuti']['name'];
        $file_size = $_FILES['bukti_cuti']['size'];
        $error = $_FILES['bukti_cuti']['error'];
        $file_temp = $_FILES['bukti_cuti']['tmp_name'];

        //validasi gambar diupload
        if ($error === 4) {
            echo "<script>
                    alert('Silahkan pilih gambar !');
                </script>";
            return false;
        }

        //validasi ekstensi
        $extGambarValid = ['jpg', 'jpeg', 'png'];
        $extGambar = explode('.', $file_name);
        $getExtGambar = strtolower(end($extGambar));
        if (!in_array($getExtGambar, $extGambarValid)) {
            echo "<script>
            alert('File yang Anda upload bukan gambar');
        </script>";
        }

        //validasi size gambar
        if ($file_size > 1000000) {
            echo "<script>
                    alert('Ukuran gambar melebihi batas maksimum !');
                </script>";
        }

        //jika lolos validasi, gambar siap diupload
        move_uploaded_file($file_temp, __DIR__ . '/../../public/assets/img/upload/' . $file_name);
        return $file_name;
    }

    public function store($data)
    {
        $data['bukti_cuti'] = $this->upload();
        // if (!$data['bukti_cuti']) {
        //     return false;
        // }

        $query = "INSERT INTO `transcuti` VALUES ('', :cuti_id, :karyawan_id, :bukti_cuti, :mulai_cuti, :selesai_cuti, :cuti_diambil, :cuti_diambil_sementara, :sisa_cuti, :sisa_cuti_sementara, :telp, :keterangan, :approval_1, :approval_2, :approval_3, :approval_4, :approval_5, :status, :created_at, :updated_at, :created_by, :updated_by)";

        $this->db->query($query);
        $this->db->bind('cuti_id', $data['cuti_id']);
        $this->db->bind('karyawan_id', $data['karyawan_id'] ?? null);
        $this->db->bind('bukti_cuti', $data['bukti_cuti'] ?? null);
        $this->db->bind('mulai_cuti', $data['mulai_cuti'] ?? null);
        $this->db->bind('selesai_cuti', $data['selesai_cuti'] ?? null);
        $this->db->bind('cuti_diambil', $data['cuti_diambil'] ?? null);
        $this->db->bind('cuti_diambil_sementara', $data['cuti_diambil_sementara'] ?? null);
        $this->db->bind('sisa_cuti', $data['sisa_cuti'] ?? null);
        $this->db->bind('sisa_cuti_sementara', $data['sisa_cuti_sementara'] ?? null);
        $this->db->bind('telp', $data['telp'] ?? null);
        $this->db->bind('keterangan', $data['keterangan'] ?? null);
        $this->db->bind('approval_1', $data['approval_1'] ?? null);
        $this->db->bind('approval_2', $data['approval_2'] ?? null);
        $this->db->bind('approval_3', $data['approval_3'] ?? null);
        $this->db->bind('approval_4', $data['approval_4'] ?? null);
        $this->db->bind('approval_5', $data['approval_5'] ?? null);
        $this->db->bind('status', $data['status']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);
        $this->db->bind('created_by', $_SESSION['user']['id_user']);
        $this->db->bind('updated_by', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getCutiSaya($data)
    {
        $this->db->query("SELECT t.*, k.nama AS karyawan, a1.nama AS atasan1, a2.nama AS atasan2, a3.nama AS atasan3, a4.nama AS atasan4, a5.nama AS atasan5, cr.nama AS creator, c.nama_cuti AS cuti, cid.id AS cuti_id FROM transcuti AS t INNER JOIN karyawan AS k ON t.karyawan_id = k.id LEFT JOIN karyawan AS a1 ON t.approval_1 = a1.id LEFT JOIN karyawan AS a2 ON t.approval_2 = a2.id LEFT JOIN karyawan AS a3 ON t.approval_3 = a3.id LEFT JOIN karyawan AS a4 ON t.approval_4 = a4.id LEFT JOIN karyawan AS a5 ON t.approval_5 = a5.id LEFT JOIN karyawan AS cr ON t.created_by = cr.id INNER JOIN cuti AS c ON t.cuti_id = c.id INNER JOIN cuti AS cid ON t.cuti_id = cid.id WHERE karyawan_id = :data ORDER BY created_at DESC");

        $this->db->bind('data', $data);
        return $this->db->resultSet();
    }

    public function getCutiKaryawan($data)
    {
        $this->db->query("SELECT t.*, k.nama AS karyawan, a1.nama AS atasan1, a2.nama AS atasan2, a3.nama AS atasan3, a4.nama AS atasan4, a5.nama AS atasan5, cr.nama AS creator, c.nama_cuti AS cuti, cid.id AS cuti_id FROM transcuti AS t INNER JOIN karyawan AS k ON t.karyawan_id = k.id LEFT JOIN karyawan AS a1 ON t.approval_1 = a1.id LEFT JOIN karyawan AS a2 ON t.approval_2 = a2.id LEFT JOIN karyawan AS a3 ON t.approval_3 = a3.id LEFT JOIN karyawan AS a4 ON t.approval_4 = a4.id LEFT JOIN karyawan AS a5 ON t.approval_5 = a5.id LEFT JOIN karyawan AS cr ON t.created_by = cr.id INNER JOIN cuti AS c ON t.cuti_id = c.id LEFT JOIN `group` ON `group`.karyawan_id = t.karyawan_id INNER JOIN cuti AS cid ON t.cuti_id = cid.id WHERE `group`.`atasan_1` = :data or `group`.atasan_2 = :data or `group`.atasan_3 = :data or `group`.atasan_4 or `group`.atasan_5 = :data ORDER BY created_at DESC");

        $this->db->bind('data', $data);
        return $this->db->resultSet();
    }

    public function approval($data)
    {
        $query = "UPDATE transcuti SET
        cuti_id = :cuti_id,
        karyawan_id = :karyawan_id,
        bukti_cuti = :bukti_cuti,
        mulai_cuti = :mulai_cuti,
        selesai_cuti = :selesai_cuti,
        cuti_diambil = :cuti_diambil,
        cuti_diambil_sementara = :cuti_diambil_sementara,
        sisa_cuti = :sisa_cuti,
        sisa_cuti_sementara = :sisa_cuti_sementara,
        telp = :telp,
        keterangan = :keterangan,
        approval_1 = :approval_1,
        approval_2 = :approval_2,
        approval_3 = :approval_3,
        approval_4 = :approval_4,
        approval_5 = :approval_5,
        status = :status,
        created_at = :created_at,
        updated_at = :updated_at,
        created_by = :created_by,
        updated_by = :updated_by
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('cuti_id', $data['cuti_id']);
        $this->db->bind('karyawan_id', $data['karyawan_id']);
        $this->db->bind('mulai_cuti', $data['mulai_cuti']);
        $this->db->bind('selesai_cuti', $data['selesai_cuti']);
        $this->db->bind('cuti_diambil_sementara', $data['cuti_diambil_sementara']);
        if ($data['status'] == 7) {
            $this->db->bind('cuti_diambil', $data['cuti_diambil_sementara']);
            $this->db->bind('sisa_cuti', $data['sisa_cuti_sementara']);
            $this->db->bind('bukti_cuti', $data['bukti_cuti'] ?? null);
        } elseif ($data['status'] == 30 or $data['status'] == 40 or $data['status'] == 50 or $data['status'] == 60 or $data['status'] == 70) {
            $sisaCutikaloDiReject = $data['cuti_diambil_sementara'] + $data['sisa_cuti_sementara'];
            $this->db->bind('sisa_cuti', $sisaCutikaloDiReject);
            $this->db->bind('cuti_diambil', $data['cuti_diambil'] ?? null);
            $this->db->bind('bukti_cuti', $data['bukti_cuti'] ?? null);
        } else {
            $this->db->bind('sisa_cuti', $data['sisa_cuti']);
            $this->db->bind('cuti_diambil', $data['cuti_diambil'] ?? null);
            $this->db->bind('bukti_cuti', $data['bukti_cuti'] ?? null);
        }
        $this->db->bind('sisa_cuti_sementara', $data['sisa_cuti_sementara']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('approval_1', $data['approval_1'] ?? null);
        $this->db->bind('approval_2', $data['approval_2'] ?? null);
        $this->db->bind('approval_3', $data['approval_3'] ?? null);
        $this->db->bind('approval_4', $data['approval_4'] ?? null);
        $this->db->bind('approval_5', $data['approval_5'] ?? null);
        $this->db->bind('status', $data['status']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', $data['updated_at']);
        $this->db->bind('created_by', $data['created_by']);
        $this->db->bind('updated_by',  $data['updated_by']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($id)
    {
        $query = "DELETE FROM `transcuti` WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getSisaCuti($data)
    {
        $this->db->query("SELECT MIN(sisa_cuti) FROM transcuti WHERE karyawan_id = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }
}
