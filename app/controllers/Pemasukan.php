<?php

class Pemasukan extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['pemasukan'] = $this->model('Pemasukan_model')->showCurrentMonthPemasukan();
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['total'] = $this->model('Pemasukan_model')->showTotalPemasukanByBulan();

    if (isset($_POST['bulan'])) {
      if ($this->model('Pemasukan_model')->getPemasukanByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['pemasukan'] = $this->model('Pemasukan_model')->showPemasukanByDate($_POST);
        $data['total'] = $this->model('Pemasukan_model')->showTotalPemasukanByBulan($_POST);
      } else {
        Flasher::setFlash('danger', 'Pemasukan', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/pemasukan');
        exit;
      }
    }

    $data['title'] = 'PEMASUKAN | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar', $data);
    $this->view('pemasukan/index', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'TAMBAH PEMASUKAN | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('pemasukan/tambah', $data);
    $this->view('templates/footer');
  }

  public function prosesTambah()
  {
    if ($this->model('Pemasukan_model')->tambah($_POST) > 0) {
      if ($this->model('Saldo_model')->masuk($_POST) > 0) {
        Flasher::setFlash('success', 'Pemasukan', 'berhasil', 'ditambahkan');
        header('Location: ' . BASEURL . '/pemasukan');
        exit;
      } else {
        Flasher::setFlash('success', 'Saldo', 'gagal', 'ditambahkan');
        header('Location: ' . BASEURL . '/pemasukan');
        exit;
      }
    } else {
      Flasher::setFlash('danger', 'Pemasukan', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/pemasukan/tambah');
      exit;
    }
  }
}
