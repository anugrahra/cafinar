<?php

class Hutang extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['hutang'] = $this->model('Hutang_model')->showCurrentMonthHutang();
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['total'] = $this->model('Hutang_model')->showTotal();

    if (isset($_POST['bulan'])) {
      if ($this->model('Hutang_model')->getHutangByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['hutang'] = $this->model('Hutang_model')->showHutangByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Hutang', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/Hutang');
        exit;
      }
    }

    $data['title'] = 'Hutang | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('hutang/index', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'TAMBAH Hutang | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('hutang/tambah', $data);
    $this->view('templates/footer');
  }

  public function prosesTambah()
  {
    if ($this->model('Hutang_model')->tambah($_POST) > 0) {
      if ($this->model('Saldo_model')->masuk($_POST) > 0) {
        Flasher::setFlash('success', 'Hutang', 'berhasil', 'ditambahkan');
        header('Location: ' . BASEURL . '/hutang');
        exit;
      } else {
        Flasher::setFlash('success', 'Saldo', 'gagal', 'dikurangi');
        header('Location: ' . BASEURL . '/hutang');
        exit;
      }
    } else {
      Flasher::setFlash('danger', 'Hutang', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/hutang/tambah');
      exit;
    }
  }
}
