<?php

class Analisa extends Controller
{
  public function index()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
    $data['title'] = 'ANALISA | ' . $this->title;
    $data['tgl_sekarang'] = date('d F Y');
    $data['sisa_hari'] = (int)date('t') + 1 - (int)date('j');
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['pengeluaran_maks'] = $data['saldo']['saldo'] / $data['sisa_hari'];
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('analisa/index', $data);
    $this->view('templates/footer');
  }

  public function chartPemasukanPengeluaran()
  {
    header('Content-Type: application/json');
    $pemasukan = $this->model('Pemasukan_model')->showTotalPemasukanByBulan();
    $pengeluaran = $this->model('Pengeluaran_model')->showTotalPengeluaranByBulan();

    $cashflow = ["pemasukan" => $pemasukan['total'], "pengeluaran" => $pengeluaran['total']];

    echo json_encode($cashflow);
  }

  public function chartPemasukanPerHari()
  {
    header('Content-Type: application/json');
    echo json_encode($this->model('Pemasukan_model')->defaultPemasukanPerHari());
  }

  public function chartPemasukanPerHariByBulan()
  {
    echo json_encode($this->model('Pemasukan_model')->showPemasukanPerHari($_POST));
  }

  public function chartPengeluaranPerHari()
  {
    header('Content-Type: application/json');
    echo json_encode($this->model('Pengeluaran_model')->defaultPengeluaranPerHari());
  }

  public function chartPengeluaranPerHariByBulan()
  {
    echo json_encode($this->model('Pengeluaran_model')->showPengeluaranPerHari($_POST));
  }

  public function chartPengeluaranPerBulan()
  {
    header('Content-Type: application/json');
    echo json_encode($this->model('Pengeluaran_model')->showPengeluaranPerBulan());
  }

  public function chartPemasukanPerBulan()
  {
    header('Content-Type: application/json');
    echo json_encode($this->model('Pemasukan_model')->showPemasukanPerBulan());
  }

  public function chartPemasukanPengeluaranPerBulan()
  {
    header('Content-Type: application/json');
    $pemasukan = $this->model('Pemasukan_model')->showPemasukanPerBulan();
    $pengeluaran = $this->model('Pengeluaran_model')->showPengeluaranPerBulan();

    $cashflow = ["pemasukan" => $pemasukan, "pengeluaran" => $pengeluaran];

    echo json_encode($cashflow);
  }
}
