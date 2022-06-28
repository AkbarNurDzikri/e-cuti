<?php

class User extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->model('User_model')->getAll(),
            'member' => $this->model('Group_model')->getAll()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store()
    {
        $cek = $this->model('User_model')->validasi($_POST['karyawan_id']);
        if ($cek > 0) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', 'Maaf, karyawan sudah terdaftar !');
            header('Location: ' . BASEURL . '/user');
            exit;
        } elseif ($_POST['password'] !== $_POST['konfirmPassword']) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', 'Konfirmasi password tidak sesuai !');
            header('Location: ' . BASEURL . '/user');
        } elseif ($this->model('User_model')->store($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil ditambahkan');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal ditambahkan');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('User_model')->update($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil diupdate');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal diupdate');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('User_model')->destroy($id) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}
