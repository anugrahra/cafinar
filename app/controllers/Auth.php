<?php

class Auth extends Controller
{
  public function signin()
  {
    $data['user'] = $this->model('Login_model')->getUser($_POST);

    if ($this->model('Login_model')->signin($_POST) > 0) {
      if (password_verify($_POST['password'], $data['user']['password'])) {
        $_SESSION['username'] = $data['user']['username'];
        $_SESSION['role'] = $data['user']['level'];
        header('Location: ' . BASEURL . '/beranda');
        exit;
      } else {
        Flasher::setFlash('danger', 'Password', 'salah', ', coba lagi');
        header('Location: ' . BASEURL);
        exit;
      }
    } else {
      Flasher::setFlash('danger', 'Username', 'tidak terdaftar', ', coba lagi');
      header('Location: ' . BASEURL);
      exit;
    }
  }

  public function signout()
  {
    unset($_SESSION['username']);

    session_unset();
    session_destroy();

    header('Location: ' . BASEURL);
  }
}
