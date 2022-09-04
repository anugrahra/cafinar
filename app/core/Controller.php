<?php
// class utama yang ngatur semua controller di folder controllers
class Controller
{
  public $title = 'CAFINAR';

  public function __construct()
  {
    date_default_timezone_set("Asia/Jakarta");
    setlocale(LC_ALL, 'id_ID.utf8');
  }

  public function view($view, $data = [])
  {
    require_once 'app/views/' . $view . '.php';
  }

  public function model($model)
  {
    require_once 'app/models/' . $model . '.php';
    // instansiasi class model
    return new $model;
  }
}
