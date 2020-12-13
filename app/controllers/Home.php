<?php

class Home extends Controller
{
  public function index()
  {
    if (isset($_SESSION['username'])) header('Location: ' . BASEURL . '/beranda');
    $data['title'] = 'LOGIN | ' . $this->title;
    $this->view('home/index', $data);
  }
}
