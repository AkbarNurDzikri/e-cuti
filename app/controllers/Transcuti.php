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
            'hak_cuti' => $this->model('Transcuti_model')->getHakCuti($_SESSION['user']['id_user']),
            'cuti_in' => $this->model('Transcuti_model')->getTotalCutiIn($_SESSION['user']['id_user']),
            'cuti_out' => $this->model('Transcuti_model')->getTotalCutiOut($_SESSION['user']['id_user']),
            'user_login' => $this->model('Auth_model')->getAll(),
            'filter' => 'Filtered by : Cuti Saya'
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('transcuti/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function cutiKaryawan()
    {
        $data = [
            'title' => 'Data Trans Cuti',
            'transcuti' => $this->model('Transcuti_model')->getCutiKaryawan($_SESSION['user']['id_user']),
            'cuti' => $this->model('Transcuti_model')->getMasterCuti(),
            'karyawan' => $this->model('Karyawan_model')->getAll(),
            'hak_cuti' => $this->model('Transcuti_model')->getHakCuti($_SESSION['user']['id_user']),
            'cuti_in' => $this->model('Transcuti_model')->getTotalCutiIn($_SESSION['user']['id_user']),
            'cuti_out' => $this->model('Transcuti_model')->getTotalCutiOut($_SESSION['user']['id_user']),
            'filter' => 'Filtered by : Cuti Karyawan'
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('transcuti/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store()
    {
        if ($_POST['cuti_out'] == 'Invalid Date !') {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Tanggal yang Anda pilih tidak valid !');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($_POST['cuti_out'] == null or $_POST['cuti_out'] == 0) {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Cuti Diambil tidak terdeteksi ! Ulangi permohonan cuti Anda');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($_POST['cuti_out'] == 'Saldo kurang !') {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Saldo cuti Anda tidak cukup ! Hubungi HRD jika perlu');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($_POST['cuti_out'] == 'NaN') {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Terjadi kesalahan. Silahkan ulangi permohonan cuti Anda !');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } elseif ($this->model('Transcuti_model')->store($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Berhasil membuat permohonan cuti');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Gagal membuat permohonan cuti !');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        }
    }

    public function approval()
    {
        if ($this->model('Transcuti_model')->approval($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil diupdate');
            header('Location: ' . BASEURL . '/transcuti/cutiKaryawan');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal diupdate');
            header('Location: ' . BASEURL . '/transcuti/cutiKaryawan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Transcuti_model')->destroy($id) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/transcuti');
            exit;
        }
    }
}
