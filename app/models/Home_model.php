<?php

class Home_model
{
  private $table = '',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }
}
