<?php

class Piutang extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['piutang'] = $this->model('Piutang_model')->showCurrentMonthPiutang();
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['total'] = $this->model('Piutang_model')->showTotal();

    if (isset($_POST['bulan'])) {
      if ($this->model('Piutang_model')->getPiutangByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['piutang'] = $this->model('Piutang_model')->showPiutangByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Piutang', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/piutang');
        exit;
      }
    }

    $data['title'] = 'Piutang | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('piutang/index', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'TAMBAH Piutang | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('piutang/tambah', $data);
    $this->view('templates/footer');
  }

  public function prosesTambah()
  {
    if ($this->model('Piutang_model')->tambah($_POST) > 0) {
      if ($this->model('Saldo_model')->keluar($_POST) > 0) {
        Flasher::setFlash('success', 'Piutang', 'berhasil', 'ditambahkan');
        header('Location: ' . BASEURL . '/piutang');
        exit;
      } else {
        Flasher::setFlash('success', 'Saldo', 'gagal', 'dikurangi');
        header('Location: ' . BASEURL . '/piutang');
        exit;
      }
    } else {
      Flasher::setFlash('danger', 'Piutang', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/piutang/tambah');
      exit;
    }
  }
}
