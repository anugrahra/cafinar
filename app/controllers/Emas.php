<?php

class Emas extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['emas'] = $this->model('Emas_model')->showEmas();
    $data['total'] = $this->model('Emas_model')->showTotal();
    $data['title'] = 'Emas | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('emas/index', $data);
    $this->view('templates/footer');
  }

  public function beli()
  {
    $data['title'] = 'BELI EMAS | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('emas/beli', $data);
    $this->view('templates/footer');
  }

  public function jual()
  {
    $data['emas'] = $this->model('Emas_model')->showEmas();
    $data['title'] = 'JUAL EMAS | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('emas/jual', $data);
    $this->view('templates/footer');
  }

  public function info()
  {
    $data['title'] = 'INFO EMAS | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('emas/info', $data);
    $this->view('templates/footer');
  }

  public function prosesBeli()
  {
    if ($this->model('Emas_model')->beli($_POST) > 0) {
      Flasher::setFlash('success', 'Emas', 'berhasil', 'ditambahkan');
      header('Location: ' . BASEURL . '/emas');
      exit;
    } else {
      Flasher::setFlash('danger', 'Emas', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/emas');
      exit;
    }
  }

  public function prosesJual($id)
  {
    if ($this->model('Emas_model')->jual($id) > 0) {
      Flasher::setFlash('success', 'Emas', 'berhasil', 'dijual');
      header('Location: ' . BASEURL . '/emas');
      exit;
    } else {
      Flasher::setFlash('danger', 'Emas', 'gagal', 'dijual');
      header('Location: ' . BASEURL . '/emas');
      exit;
    }
  }
}
