<?php

class App
{
  // menentukan controller, method, dan parameter
  protected $controller = 'Home',
    $method = 'index',
    $params = [];

  public function __construct()
  {
    $url = $this->parseURL();

    // mengambil controller dari url
    if (file_exists('app/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      // unset untuk menentukan param
      unset($url[0]);
    }

    // memanggil controller
    require_once 'app/controllers/' . $this->controller . '.php';
    // instansiasi class controller
    $this->controller = new $this->controller;

    // mengambil method dari url
    // cek apakah method ada di url
    if (isset($url[1])) {
      // cek ketersediaan method pada controller
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        // unset untuk menentukan param
        unset($url[1]);
      }
    }

    // mengambil param dari url
    // cek dulu arraynya
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // run controller dan method dan param kalau ada
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
