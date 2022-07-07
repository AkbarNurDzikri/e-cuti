<?php

class Transcuti extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Trans Cuti',
            'transcuti' => $this->model('Transcuti_model')->getCutiSaya($_SESSION['user']['id_user']),
            'cuti' => $this->model('Transcuti_model')->getMasterCuti(),
            'karyawan' => $this->model('Karyawan_model')->getAll(),
            'leader' => $this->model('Group_model')->getLeader($_SESSION['user']['nama_dept']),
            'supervisor' => $this->model('Group_model')->getSupervisor($_SESSION['user']['nama_dept']),
            'manager' => $this->model('Group_model')->getManager(),
            'factory_manager' => $this->model('Group_model')->getFactoryManager(),
            'hrd' => $this->model('Group_model')->getHrd($_SESSION['user']['nama_dept']),
            'hak_cuti' => $this->model('Transcuti_model')->getHakCuti($_SESSION['user']['id_user']),
            'cuti_in' => $this->model('Transcuti_model')->getTotalCutiIn($_SESSION['user']['id_user']),
            'cuti_out' => $this->model('Transcuti_model')->getTotalCutiOut($_SESSION['user']['id_user']),
            'user_login' => $this->model('Auth_model')->getAll(),
            'breadcrumb' => 'Dafar Cuti Saya'
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('transcuti/index', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function cutiKaryawan()
    {
        $data = [
            'title' => 'Data Trans Cuti',
            'transcuti' => $this->model('Transcuti_model')->getCutiKaryawan($_SESSION['user']['id_user']),
            'cuti' => $this->model('Transcuti_model')->getMasterCuti(),
            'leader' => $this->model('Group_model')->getLeader($_SESSION['user']['nama_dept']),
            'supervisor' => $this->model('Group_model')->getSupervisor($_SESSION['user']['nama_dept']),
            'manager' => $this->model('Group_model')->getManager($_SESSION['user']['nama_dept']),
            'factory_manager' => $this->model('Group_model')->getFactoryManager($_SESSION['user']['nama_dept']),
            'hrd' => $this->model('Group_model')->getHrd($_SESSION['user']['nama_dept']),
            'karyawan' => $this->model('Karyawan_model')->getAll(),
            'hak_cuti' => $this->model('Transcuti_model')->getHakCuti($_SESSION['user']['id_user']),
            'cuti_in' => $this->model('Transcuti_model')->getTotalCutiIn($_SESSION['user']['id_user']),
            'cuti_out' => $this->model('Transcuti_model')->getTotalCutiOut($_SESSION['user']['id_user']),
            'user_login' => $this->model('Auth_model')->getAll(),
            'breadcrumb' => 'Daftar Cuti Karyawan'
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('transcuti/cutiKaryawan', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function sisaCutiKaryawan()
    {
        $data = [
            'breadcrumb' => 'Sisa Cuti Karyawan',
            'cuti_diambil' => $this->model('Transcuti_model')->getCutiOut()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('transcuti/sisaCutiKaryawan', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function store()
    {
        if ($_POST['cuti_out'] == 'Invalid Date !') {
            Flasher::setFlash('warning', 'Tanggal yang Anda pilih tidak valid ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($_POST['cuti_out'] == null or $_POST['cuti_out'] == 0) {
            Flasher::setFlash('warning', 'Cuti Diambil tidak terdeteksi ! Ulangi permohonan cuti Anda ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($_POST['cuti_out'] == 'Saldo kurang !') {
            Flasher::setFlash('warning', 'Saldo cuti Anda tidak cukup ! Hubungi HRD jika perlu ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($_POST['cuti_out'] == 'NaN') {
            Flasher::setFlash('warning', 'Terjadi kesalahan. Silahkan ulangi permohonan cuti Anda ! ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($this->model('Transcuti_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil membuat permohonan cuti ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal membuat permohonan cuti ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        }
    }

    public function approval()
    {
        if ($this->model('Transcuti_model')->approval($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil memberikan keputusan ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/transcuti/cutiKaryawan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal memberikan keputusan ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/transcuti/cutiKaryawan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Transcuti_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Berhasil menghapus data ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal menghapus data ', '<i class="fa-2x fa-solid fa-circle-info"></i>' );
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        }
    }
}
