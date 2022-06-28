<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('templates/landing-page/header');
        $this->view('home/index');
        $this->view('templates/landing-page/footer');
    }
}
