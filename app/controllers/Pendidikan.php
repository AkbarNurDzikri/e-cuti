<?php

class Pendidikan extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pendidikan',
            'pendidikan' => $this->model('Pendidikan_model')->getAll()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('pendidikan/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store()
    {
        $cek = $this->model('Pendidikan_model')->validasi($_POST['nama_pendidikan']);
        if ($cek > 0) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', '<b>Maaf, data yang Anda masukkan sudah ada !</b>');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } elseif ($this->model('Pendidikan_model')->store($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil ditambahkan');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal ditambahkan');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Pendidikan_model')->update($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil diupdate');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal diupdate');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Pendidikan_model')->destroy($id) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/pendidikan');
            exit;
        }
    }
}
