<?php

class Beranda extends Controller
{
  public function index()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
    $data['title'] = 'BERANDA | ' . $this->title;
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('beranda/index', $data);
    $this->view('templates/footer');
  }
}
