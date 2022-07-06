<?php

class Pendidikan extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pendidikan',
            'pendidikan' => $this->model('Pendidikan_model')->getAll(),
            'user_login' => $this->model('Auth_model')->getAll()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('pendidikan/index', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function store()
    {
        $cek = $this->model('Pendidikan_model')->validasi($_POST['nama_pendidikan']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, data yang Anda masukkan sudah ada ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } elseif ($this->model('Pendidikan_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil ditambahkan ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal ditambahkan ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Pendidikan_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil diupdate ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal diupdate ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Pendidikan_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Data berhasil dihapus ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal dihapus ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        }
    }
}
