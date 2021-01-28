<?php

class Reksadana extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['title'] = 'REKSADANA | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar', $data);
    $this->view('reksadana/index', $data);
    $this->view('templates/footer');
  }
}
