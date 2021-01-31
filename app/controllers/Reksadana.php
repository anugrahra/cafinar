<?php

class Reksadana extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['reksadana'] = $this->model('Reksadana_model')->showCurrentMonthReksadana();
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['total'] = $this->model('Reksadana_model')->showTotal();

    if (isset($_POST['bulan'])) {
      if ($this->model('Reksadana_model')->getReksadanaByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['reksadana'] = $this->model('Reksadana_model')->showReksadanaByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Reksadana', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/reksadana');
        exit;
      }
    }

    $data['title'] = 'REKSADANA | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar', $data);
    $this->view('reksadana/index', $data);
    $this->view('templates/footer');
  }

  public function invest()
  {
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['title'] = 'INVEST REKSADANA | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar', $data);
    $this->view('reksadana/invest');
    $this->view('templates/footer');
  }

  public function jual()
  {
    $data['saldo'] = $this->model('Saldo_model')->showSaldo();
    $data['title'] = 'JUAL REKSADANA | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar', $data);
    $this->view('reksadana/jual');
    $this->view('templates/footer');
  }

  public function transfer()
  {
    if ($_POST['jual'] == 0) {
      // proses invest
      if ($this->model('Reksadana_model')->transfer($_POST) > 0) {
        if ($this->model('Saldo_model')->keluar($_POST) > 0) {
          Flasher::setFlash('success', 'Reksadana', 'berhasil', 'ditambahkan');
          header('Location: ' . BASEURL . '/reksadana');
          exit;
        } else {
          Flasher::setFlash('success', 'Saldo', 'gagal', 'dikurangi');
          header('Location: ' . BASEURL . '/reksadana');
          exit;
        }
      } else {
        Flasher::setFlash('danger', 'Tabungan', 'gagal', 'ditambahkan');
        header('Location: ' . BASEURL . '/reksadana/invest');
        exit;
      }
    } else {
      // proses narik
      if ($this->model('Reksadana_model')->transfer($_POST) > 0) {
        if ($this->model('Saldo_model')->masuk($_POST) > 0) {
          Flasher::setFlash('success', 'Reksadana', 'berhasil', 'ditarik');
          header('Location: ' . BASEURL . '/reksadana');
          exit;
        } else {
          Flasher::setFlash('success', 'Saldo', 'gagal', 'ditambah');
          header('Location: ' . BASEURL . '/reksadana');
          exit;
        }
      } else {
        Flasher::setFlash('danger', 'Reksadana', 'gagal', 'dijual');
        header('Location: ' . BASEURL . '/reksadana/jual');
        exit;
      }
    }
  }
}
