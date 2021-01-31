<?php

class Beranda extends Controller
{
  public function index()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
    $data['title'] = 'BERANDA | ' . $this->title;
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['tabungan'] = $this->model('Tabungan_model')->showTotal();
    $data['emas'] = $this->model('Emas_model')->showTotal();
    $data['hutang'] = $this->model('Hutang_model')->showTotal();
    $data['piutang'] = $this->model('Piutang_model')->showTotal();
    $data['reksadana'] = $this->model('Reksadana_model')->showTotal();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('beranda/index', $data);
    $this->view('templates/footer');
  }
}
