<?php

class Dept extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Departemen',
            'dept' => $this->model('Dept_model')->getAll(),
            'user_login' => $this->model('Auth_model')->getAll()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dept/index', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function store()
    {
        $cek = $this->model('Dept_model')->validasi($_POST['nama_dept']);
        if ($cek > 0) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', '<b>Maaf, data yang Anda masukkan sudah ada !</b>');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } elseif ($this->model('Dept_model')->store($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil ditambahkan');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal ditambahkan');
            header('Location: ' . BASEURL . '/dept');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Dept_model')->update($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil diupdate');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal diupdate');
            header('Location: ' . BASEURL . '/dept');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Dept_model')->destroy($id) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/dept');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/dept');
            exit;
        }
    }
}
