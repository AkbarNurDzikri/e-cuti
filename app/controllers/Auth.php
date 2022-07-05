<?php

class Auth extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login User'
        ];

        $this->view('templates/landing-page/header', $data);
        $this->view('home/login', $data);
        $this->view('templates/landing-page/footer');
    }

    // login proses
    public function credentials()
    {
        $cek = $this->model('Auth_model')->validasi($_POST['username']);
        $user = $this->model('Auth_model')->getUser($_POST['username']);

        if ($cek > 0 && password_verify($_POST['password'], $cek['password'])) {
            $_SESSION['user'] = $user;
            header('Location: ' . BASEURL . '/dashboard');
        } else {
            Flasher::setFlash('danger', 'Username atau password tidak dikenal ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/auth');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
    }

    public function changePassword()
    {
        $cek = $this->model('Auth_model')->check($_SESSION['user']['id_user']);

        if (password_verify($_POST['passwordLama'], $cek['password']) == false) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', 'Password salah !');
            header('Location: ' . BASEURL . '/transcuti');
        } elseif ($_POST['password'] !== $_POST['konfirmPassword']) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', 'Konfirmasi password tidak sesuai !');
            header('Location: ' . BASEURL . '/transcuti');
        } elseif ($this->model('Auth_model')->update($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', 'Update password berhasil !');
            header('Location: ' . BASEURL . '/auth');
            // session_unset();
            // session_destroy();
        }
    }
}
