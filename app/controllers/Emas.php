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
    $data['title'] = 'Emas | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('emas/index', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'TAMBAH Emas | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('emas/tambah', $data);
    $this->view('templates/footer');
  }

  public function prosesTambah()
  {
    if ($this->model('Emas_model')->tambah($_POST) > 0) {
      Flasher::setFlash('success', 'Emas', 'berhasil', 'ditambahkan');
      header('Location: ' . BASEURL . '/Emas');
      exit;
    } else {
      Flasher::setFlash('danger', 'Emas', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/piutang/tambah');
      exit;
    }
  }
}
