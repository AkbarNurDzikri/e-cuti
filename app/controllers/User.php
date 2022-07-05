<?php

class User extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
        } else {
            $data = [
                'title' => 'Data User',
                'user' => $this->model('User_model')->getAll(),
                'member' => $this->model('Group_model')->getAll(),
                'karyawan' => $this->model('Karyawan_model')->getAll(),
                'user_login' => $this->model('Auth_model')->getAll()
            ];

            $this->view('templates/dashboard/header', $data);
            $this->view('user/index', $data);
            $this->view('templates/dashboard/footer', $data);
        }
    }

    public function store()
    {
        $cek = $this->model('User_model')->validasi($_POST['karyawan_id']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, karyawan sudah terdaftar ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/user');
            exit;
        } elseif ($_POST['password'] !== $_POST['konfirmPassword']) {
            Flasher::setFlash('danger', 'Konfirmasi password tidak sesuai. Perhatikan huruf besar kecil ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/user');
        } elseif ($this->model('User_model')->store($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil menambahkan user baru ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('warning', 'Data gagal ditambahkan ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('User_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil mengupdate data', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal mengupdate data', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('User_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Berhasil menghapus data', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal menghapus data', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}
