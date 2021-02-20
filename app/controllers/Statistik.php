<?php

class Statistik extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['title'] = 'Statistik | ' . $this->title;
    $data['tahun'] = date('Y');
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('statistik/index', $data);
    $this->view('templates/footer');
  }
}
