<?php

class Jabatan extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jabatan',
            'jabatan' => $this->model('Jabatan_model')->getAll(),
            'user_login' => $this->model('Auth_model')->getAll(),
            'breadcrumb' => 'Master Data / Jabatan'
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('jabatan/index', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function store()
    {
        $cek = $this->model('Jabatan_model')->validasi($_POST['nama_jabatan']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, data yang Anda masukkan sudah ada ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        } elseif ($this->model('Jabatan_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil ditambahkan ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal ditambahkan ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Jabatan_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil diupdate ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal diupdate ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Jabatan_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Data berhasil dihapus ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal dihapus ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        }
    }
}
