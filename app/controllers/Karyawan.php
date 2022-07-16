<?php

class Karyawan extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
        } else {
            $data = [
                'title' => 'Data Karyawan',
                'karyawan' => $this->model('Karyawan_model')->getAll(),
                'pendidikan' => $this->model('Pendidikan_model')->getAll(),
                'jurusan' => $this->model('Jurusan_model')->getAll(),
                'user_login' => $this->model('Auth_model')->getAll(),
                'breadcrumb' => 'Data Karyawan'
            ];

            $this->view('templates/dashboard/header', $data);
            $this->view('karyawan/index', $data);
            $this->view('templates/dashboard/footer', $data);
        }
    }

    public function store()
    {
        $cek = $this->model('Karyawan_model')->validasi($_POST['nama']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, data yang Anda masukkan sudah ada ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } elseif ($this->model('Karyawan_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil menambahkan data baru ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal menambahkan data ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Karyawan_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil mengupdate data ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal mengupdate data ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Karyawan_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Berhasil menghapus data ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal menghapus data ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }
}
