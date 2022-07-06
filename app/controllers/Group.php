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
            'jabatan' => $this->model('Jabatan_model')->getAll(),
            'user_login' => $this->model('Auth_model')->getAll()
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('group/index', $data);
        $this->view('templates/dashboard/footer', $data);
    }

    public function store()
    {
        $cek = $this->model('Group_model')->duplicateValidation($_POST['karyawan_id']);
        if ($cek > 0) {
            Flasher::setFlash('danger', 'Maaf, data yang Anda masukkan sudah terdaftar ', '<i class="fa-2x fa-solid fa-circle-exclamation"></i>');
            header('Location: ' . BASEURL . '/group');
            exit;
        } elseif ($this->model('Group_model')->store($_POST)) {
            Flasher::setFlash('success', 'Berhasil menambahkan data baru ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/group');
            exit;
        } else {
            Flasher::setFlash('warning', 'Gagal menambahkan data ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/group');
            exit;
        }
    }

    public function update()
    {
        $cekRelasi = $this->model('Group_model')->checkRelation($_POST['karyawan_id']);

        try {
            if($cekRelasi == true) {
                throw new Exception("Data sudah berelasi !");
            } elseif($this->model('Group_model')->update($_POST) > 0) {
                Flasher::setFlash('success', 'Berhashil mengupdate data ', '<i class="fa-2x fa-solid fa-check"></i>');
                header('Location: ' . BASEURL . '/group');
                exit;
            }
        } catch(Exception $e) {
            Flasher::setFlash('danger', '<i class="fa-2x fa-solid fa-circle-info"></i>', 'Gagal mengupdate data : <br> ' . $e->getMessage());
            header('Location: ' . BASEURL . '/group');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Group_model')->destroy($id) > 0) {
            Flasher::setFlash('success', 'Berhasil menghapus data ', '<i class="fa-2x fa-solid fa-check"></i>');
            header('Location: ' . BASEURL . '/group');
            exit;
        } else {
            Flasher::setFlash('warning', 'Berhasil menghapus data ', '<i class="fa-2x fa-solid fa-circle-info"></i>');
            header('Location: ' . BASEURL . '/group');
            exit;
        }
    }
}
