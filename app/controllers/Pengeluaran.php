<?php

class Pengeluaran extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['pengeluaran'] = $this->model('Pengeluaran_model')->showCurrentMonthPengeluaran();
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();

    if (isset($_POST['bulan'])) {
      if ($this->model('Pengeluaran_model')->getPengeluaranByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['pengeluaran'] = $this->model('Pengeluaran_model')->showPengeluaranByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Pengeluaran', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/pengeluaran');
        exit;
      }
    }

    $data['title'] = 'PENGELUARAN | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('pengeluaran/index', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'TAMBAH PENGELUARAN | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('pengeluaran/tambah', $data);
    $this->view('templates/footer');
  }

  public function prosesTambah()
  {
    if ($this->model('Pengeluaran_model')->tambah($_POST) > 0) {
      if ($this->model('Saldo_model')->keluar($_POST) > 0) {
        Flasher::setFlash('success', 'Pengeluaran', 'berhasil', 'ditambahkan');
        header('Location: ' . BASEURL . '/pengeluaran');
        exit;
      } else {
        Flasher::setFlash('success', 'Saldo', 'gagal', 'dikurangi');
        header('Location: ' . BASEURL . '/pengeluaran');
        exit;
      }
    } else {
      Flasher::setFlash('danger', 'Pengeluaran', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/pengeluaran/tambah');
      exit;
    }
  }
}
