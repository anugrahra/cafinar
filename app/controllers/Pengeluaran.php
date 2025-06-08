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
  $data['hidepengeluaran'] = "";

  // Fungsi pembantu untuk hitung persentase & atributnya
  $hitungBanding = function ($total, $bulanlalu) {
    $result = [];
    if ((int)$bulanlalu == 0) {
      $result['banding'] = 100;
      $result['bandingnote'] = 'Tidak ada data bulan lalu';
      $result['bandingcolor'] = 'danger';
      $result['arrow'] = '&#8593;';
      $result['turunnaik'] = 'Naik';
    } else {
      $persentase = abs(100 - ((int)$total / (int)$bulanlalu * 100));
      $result['banding'] = $persentase;
      $result['bandingnote'] = '';

      if ((int)$total > (int)$bulanlalu) {
        $result['bandingcolor'] = 'danger';
        $result['arrow'] = '&#8593;';
        $result['turunnaik'] = 'Naik';
      } else if ((int)$total < (int)$bulanlalu) {
        $result['bandingcolor'] = 'success';
        $result['arrow'] = '&#8595;';
        $result['turunnaik'] = 'Turun';
      } else {
        $result['bandingcolor'] = 'secondary';
        $result['arrow'] = '&#8644;';
        $result['turunnaik'] = 'Sama';
      }
    }
    return $result;
  };

  // Load default data
  $data['total'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan();
  $data['bulanlalu'] = $this->model('Pengeluaran_model')->showTotalPengeluaranBulanLalu();
  $data['sumkategori'] = $this->model('Pengeluaran_model')->showPengeluaranByKategoriByBulan();

  $bandingData = $hitungBanding($data['total']['total'], $data['bulanlalu']['total']);
  $data = array_merge($data, $bandingData);

  // Jika ada input bulan dari user
  if (isset($_POST['bulan'])) {
    if ($this->model('Pengeluaran_model')->getPengeluaranByKategoriByBulan($_POST) > 0) {
      $explode = explode('|', $_POST['bulan']);
      $bulan = $explode[1];

      $data['bulan'] = $bulan;
      $data['tahun'] = $_POST['tahun'];
      $data['sumkategori'] = $this->model('Pengeluaran_model')->showPengeluaranByKategoriByBulan($_POST);
      $data['total'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan($_POST);
      $data['bulanlalu'] = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulanLalunya($_POST);
      $data['hidepengeluaran'] = "d-none";

      $bandingData = $hitungBanding($data['total']['total'], $data['bulanlalu']['total']);
      $data = array_merge($data, $bandingData);
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
