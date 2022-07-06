<?php

class Jurusan extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jurusan',
            'jurusan' => $this->model('Jurusan_model')->getAll(),
            'user_login' => $this->model('Auth_model')->getAll()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function store()
    {
        $cek = $this->model('Jurusan_model')->validasi($_POST['nama_pendidikan']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, data yang Anda masukkan sudah ada  ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        } elseif ($this->model('Jurusan_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil ditambahkan ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal ditambahkan ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Jurusan_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil diupdate ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal diupdate ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Jurusan_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Data berhasil dihapus ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal dihapus ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        }
    }
}
