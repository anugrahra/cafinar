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
    $data['total'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan();
    $data['ratapengeluaran'] = (int)$data['total']['total'] / date('d');
    $data['ratapengeluaranbulanini'] = (int)$data['total']['total'] / date('t');
    $data['hidepengeluaran'] = "";

    if (isset($_POST['bulan'])) {
      if ($this->model('Pengeluaran_model')->getPengeluaranByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['pengeluaran'] = $this->model('Pengeluaran_model')->showPengeluaranByDate($_POST);
        $data['total'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan($_POST);
        $jmlhari = cal_days_in_month(CAL_GREGORIAN, (int)$explode[0], (int)$data['tahun']);
        $data['ratapengeluaranbulanini'] = (int)$data['total']['total'] / $jmlhari;
        $data['hidepengeluaran'] = "d-none";
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

  public function statistik()
  {
    $data['title'] = 'STATISTIK PENGELUARAN | ' . $this->title;
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['total'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan();
    $data['sumkategori'] = $this->model('Pengeluaran_model')->showPengeluaranByKategoriByBulan();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('pengeluaran/statistik', $data);
    $this->view('templates/footer');
  }

  public function persentase()
  {
    $data['title'] = 'STATISTIK PERSENTASE | ' . $this->title;
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['total'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan();
    $data['bulanlalu'] = $this->model('Pengeluaran_model')->showTotalPengeluaranBulanLalu();
    $data['sumkategori'] = $this->model('Pengeluaran_model')->showPengeluaranByKategoriByBulan();
    $data['banding'] = abs(100 - ((int)$data['total']['total'] / (int)$data['bulanlalu']['total'] * 100));
    $data['hidepengeluaran'] = "";

    if ((int)$data['total']['total'] > (int)$data['bulanlalu']['total']) {
      $data['bandingcolor'] = 'danger';
      $data['arrow'] = '&#8593;';
      $data['turunnaik'] = 'Naik';
    } else if ((int)$data['total']['total'] < (int)$data['bulanlalu']['total']) {
      $data['bandingcolor'] = 'success';
      $data['arrow'] = '&#8595;';
      $data['turunnaik'] = 'Turun';
    } else {
      $data['bandingcolor'] = 'secondary';
      $data['arrow'] = '&#8644;';
      $data['turunnaik'] = 'Sama';
    }

    if (isset($_POST['bulan'])) {
      if ($this->model('Pengeluaran_model')->getPengeluaranByKategoriByBulan($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['sumkategori'] = $this->model('Pengeluaran_model')->showPengeluaranByKategoriByBulan($_POST);
        $data['total'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan($_POST);
        $data['bulanlalu'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulanLalunya($_POST);
        $data['banding'] = abs(100 - ((int)$data['total']['total'] / (int)$data['bulanlalu']['total'] * 100));
        $data['hidepengeluaran'] = "d-none";

        if ((int)$data['total']['total'] > (int)$data['bulanlalu']['total']) {
          $data['bandingcolor'] = 'danger';
          $data['arrow'] = '&#8593;';
          $data['turunnaik'] = 'Naik';
        } else if ((int)$data['total']['total'] < (int)$data['bulanlalu']['total']) {
          $data['bandingcolor'] = 'success';
          $data['arrow'] = '&#8595;';
          $data['turunnaik'] = 'Turun';
        } else {
          $data['bandingcolor'] = 'secondary';
          $data['arrow'] = '&#8644;';
          $data['turunnaik'] = 'Sama';
        }
      } else {
        Flasher::setFlash('danger', 'Pengeluaran', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/pengeluaran/persentase');
        exit;
      }
    }

    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('pengeluaran/persentase', $data);
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
