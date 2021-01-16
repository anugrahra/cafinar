<?php

class Analisa extends Controller
{
  public function index()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
    $data['title'] = 'ANALISA | ' . $this->title;
    $data['tgl_sekarang'] = date('d F Y');
    $data['sisa_hari'] = (int)date('t') - (int)date('j');
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['pengeluaran_maks'] = $data['saldo']['saldo'] / $data['sisa_hari'];
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('analisa/index', $data);
    $this->view('templates/footer');
  }
}
