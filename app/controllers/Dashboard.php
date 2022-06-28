<?php

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'totalPermohonanCuti' => $this->model('Dashboard_model')->getAllPermohonanCuti($_SESSION['user']['id_user']),
            'totalCutiTahunan' => $this->model('Dashboard_model')->getAllCutiTahunan($_SESSION['user']['id_user']),
            'totalCutiKhusus' => $this->model('Dashboard_model')->getAllCutiKhusus($_SESSION['user']['id_user']),

            'totalCutiTahunanAcc' => $this->model('Dashboard_model')->getCutiTahunanAcc($_SESSION['user']['id_user']),
            'totalCutiTahunanAccHari' => $this->model('Dashboard_model')->getCutiTahunanAccHari($_SESSION['user']['id_user']),

            'totalCutiKhususAcc' => $this->model('Dashboard_model')->getCutiKhususAcc($_SESSION['user']['id_user']),
            'totalCutiKhususAccHari' => $this->model('Dashboard_model')->getCutiKhususAccHari($_SESSION['user']['id_user']),

            'totalCutiTahunanOnProgress' => $this->model('Dashboard_model')->getCutiTahunanOnProgress($_SESSION['user']['id_user']),
            'totalCutiTahunanOnprogressHari' => $this->model('Dashboard_model')->getCutiTahunanOnProgressHari($_SESSION['user']['id_user']),

            'totalCutiKhususOnProgress' => $this->model('Dashboard_model')->getCutiKhususOnProgress($_SESSION['user']['id_user']),
            'totalCutiKhususOnprogressHari' => $this->model('Dashboard_model')->getCutiKhususOnProgressHari($_SESSION['user']['id_user']),

            'totalCutiTahunanRejected' => $this->model('Dashboard_model')->getCutiTahunanRejected($_SESSION['user']['id_user']),
            'totalCutiTahunanRejectedHari' => $this->model('Dashboard_model')->getCutiTahunanRejectedHari($_SESSION['user']['id_user']),

            'totalCutiKhususRejected' => $this->model('Dashboard_model')->getCutiKhususRejected($_SESSION['user']['id_user']),
            'totalCutiKhususRejectedHari' => $this->model('Dashboard_model')->getCutiKhususRejectedHari($_SESSION['user']['id_user']),
        ];
        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/dashboard/footer');
    }
}
