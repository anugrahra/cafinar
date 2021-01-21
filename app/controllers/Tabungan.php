<?php

class Tabungan extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['tabungan'] = $this->model('Tabungan_model')->showCurrentMonthTabungan();
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['total'] = $this->model('Tabungan_model')->showTotal();

    if (isset($_POST['bulan'])) {
      if ($this->model('Tabungan_model')->getTabunganByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['tabungan'] = $this->model('Tabungan_model')->showTabunganByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Tabungan', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/tabungan');
        exit;
      }
    }

    $data['title'] = 'Tabungan | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('tabungan/index', $data);
    $this->view('templates/footer');
  }

  public function nabung()
  {
    $data['title'] = 'NABUNG | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('tabungan/nabung', $data);
    $this->view('templates/footer');
  }

  public function narik()
  {
    $data['title'] = 'NARIK | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('tabungan/narik', $data);
    $this->view('templates/footer');
  }

  public function transfer()
  {
    if ($_POST['narik'] == 0) {
      // proses nabung
      if ($this->model('Tabungan_model')->transfer($_POST) > 0) {
        if ($this->model('Saldo_model')->keluar($_POST) > 0) {
          Flasher::setFlash('success', 'Tabungan', 'berhasil', 'ditambahkan');
          header('Location: ' . BASEURL . '/tabungan');
          exit;
        } else {
          Flasher::setFlash('success', 'Saldo', 'gagal', 'dikurangi');
          header('Location: ' . BASEURL . '/piutang');
          exit;
        }
      } else {
        Flasher::setFlash('danger', 'Tabungan', 'gagal', 'ditambahkan');
        header('Location: ' . BASEURL . '/tabungan/nabung');
        exit;
      }
    } else {
      // proses narik
      if ($this->model('Tabungan_model')->transfer($_POST) > 0) {
        if ($this->model('Saldo_model')->masuk($_POST) > 0) {
          Flasher::setFlash('success', 'Tabungan', 'berhasil', 'ditarik');
          header('Location: ' . BASEURL . '/tabungan');
          exit;
        } else {
          Flasher::setFlash('success', 'Saldo', 'gagal', 'ditambah');
          header('Location: ' . BASEURL . '/tabungan');
          exit;
        }
      } else {
        Flasher::setFlash('danger', 'Tabungan', 'gagal', 'ditarik');
        header('Location: ' . BASEURL . '/tabungan/narik');
        exit;
      }
    }
  }
}
