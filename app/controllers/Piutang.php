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
      if ($this->model('Pengeluaran_model')->tambah($_POST) > 0) {
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
        Flasher::setFlash('danger', 'Pengeluaran', 'gagal', 'ditambahkan');
        header('Location: ' . BASEURL . '/piutang');
        exit;
      }
    } else {
      Flasher::setFlash('danger', 'Piutang', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/piutang/tambah');
      exit;
    }
  }

  public function dibayar()
  {
    if ($this->model('Piutang_model')->dibayar($_POST) > 0) {
      if ($this->model('Pemasukan_model')->tambah($_POST) > 0) {
        if ($this->model('Saldo_model')->masuk($_POST) > 0) {
          Flasher::setFlash('success', 'Piutang', 'berhasil', 'dibayar');
          header('Location: ' . BASEURL . '/piutang');
          exit;
        } else {
          Flasher::setFlash('danger', 'Saldo', 'gagal', 'diupdate');
          header('Location: ' . BASEURL . '/piutang');
          exit;
        }
      } else {
        Flasher::setFlash('danger', 'Pemasukan', 'gagal', 'ditambahkan');
        header('Location: ' . BASEURL . '/piutang');
        exit;
      }
    } else {
      Flasher::setFlash('success', 'Tidak', 'ada', 'piutang');
      header('Location: ' . BASEURL . '/piutang');
      exit;
    }
  }

  public function ikhlaskan($id)
  {
    if ($this->model('Piutang_model')->ikhlaskan($id) > 0) {
      Flasher::setFlash('success', 'Piutang', 'berhasil', 'diikhlaskan');
      header('Location: ' . BASEURL . '/piutang');
      exit;
    } else {
      Flasher::setFlash('danger', 'Piutang', 'gagal', 'diikhlaskan');
      header('Location: ' . BASEURL . '/piutang');
      exit;
    }
  }

  public function cicil($id)
  {
    $data['cicil'] = $this->model('Piutang_model')->getPiutangById($id);
    $data['title'] = 'CICIL PIUTANG | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('piutang/cicil', $data);
    $this->view('templates/footer');
  }

  public function prosescicil()
  {
    if ($this->model('Piutang_model')->cicil($_POST) > 0) {
      if ($this->model('Pemasukan_model')->tambahfromcicil($_POST) > 0) {
        if ($this->model('Saldo_model')->masuk($_POST) > 0) {
          Flasher::setFlash('success', 'Piutang', 'berhasil', 'dicicil');
          header('Location: ' . BASEURL . '/piutang');
          exit;
        } else {
          Flasher::setFlash('danger', 'Saldo', 'gagal', 'diupdate');
          header('Location: ' . BASEURL . '/piutang');
          exit;
        }
      } else {
        Flasher::setFlash('danger', 'Pemasukan', 'gagal', 'diupdate');
        header('Location: ' . BASEURL . '/piutang');
        exit;
      }
    } else {
      Flasher::setFlash('danger', 'Piutang', 'gagal', 'dicicil');
      header('Location: ' . BASEURL . '/piutang');
      exit;
    }
  }
}
