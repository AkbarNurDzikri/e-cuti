<?php

class Group extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Group',
            'group' => $this->model('Group_model')->getAll(),
            'karyawan' => $this->model('Karyawan_model')->getAll(),
            'dept' => $this->model('Dept_model')->getAll(),
            'jabatan' => $this->model('Jabatan_model')->getAll()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('group/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store()
    {
        $cek = $this->model('Group_model')->validasi($_POST['karyawan_id']);
        if ($cek > 0) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>', 'Maaf, data yang Anda masukkan sudah terdaftar !');
            header('Location: ' . BASEURL . '/group');
            exit;
        } elseif ($this->model('Group_model')->store($_POST)) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil ditambahkan');
            header('Location: ' . BASEURL . '/group');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal ditambahkan');
            header('Location: ' . BASEURL . '/group');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Group_model')->update($_POST) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil diupdate');
            header('Location: ' . BASEURL . '/group');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal diupdate');
            header('Location: ' . BASEURL . '/group');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Group_model')->destroy($id) > 0) {
            Flasher::setFlash('success', '<i class="fa-2x fa-solid fa-check"></i>', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/group');
            exit;
        } else {
            Flasher::setFlash('warning', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/group');
            exit;
        }
    }
}
