<?php

class Cuti extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
        } else {
            $data = [
                'title' => 'Data Jenis Cuti',
                'cuti' => $this->model('Cuti_model')->getAll(),
                'user_login' => $this->model('Auth_model')->getAll(),
                'breadcrumb' => 'Master Data / Jenis Cuti'
            ];

            $this->view('templates/dashboard/header', $data);
            $this->view('cuti/index', $data);
            $this->view('templates/dashboard/footer', $data);
        }
    }

    public function store()
    {
        $cek = $this->model('Cuti_model')->validasi($_POST['nama_dept']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, data yang Anda masukkan sudah ada ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/cuti');
            exit;
        } elseif ($this->model('Cuti_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil ditambahkan ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/cuti');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal ditambahkan ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/cuti');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Cuti_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil diupdate ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/cuti');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal diupdate ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/cuti');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Cuti_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Data berhasil dihapus ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/cuti');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal dihapus ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/cuti');
            exit;
        }
    }
}
