<?php

class Dept extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
        } else {
            $data = [
                'title' => 'Data Departemen',
                'dept' => $this->model('Dept_model')->getAll(),
                'user_login' => $this->model('Auth_model')->getAll(),
                'breadcrumb' => 'Master Data / Department'
            ];

            $this->view('templates/dashboard/header', $data);
            $this->view('dept/index', $data);
            $this->view('templates/dashboard/footer', $data);
        }
    }

    public function store()
    {
        $cek = $this->model('Dept_model')->validasi($_POST['nama_dept']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, data yang Anda masukkan sudah ada ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } elseif ($this->model('Dept_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil ditambahkan ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal ditambahkan ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Dept_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil diupdate ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal diupdate ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Dept_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Data berhasil dihapus ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal dihapus ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        }
    }
}
