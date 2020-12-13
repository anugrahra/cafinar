<?php

class Emas_model
{
  private $table = 'emas',
    $tablePemasukan = 'pemasukan_emas',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showEmas()
  {
    $this->db->query("SELECT * FROM " . $this->table . " ORDER BY id DESC");

    return $this->db->resultSet();
  }

  public function tambah($data)
  {
    $query  = "INSERT INTO " . $this->tablePemasukan . " VALUES ('', :berat, :tanggal)";

    $this->db->query($query);
    $this->db->bind('berat', $data['berat']);
    $this->db->bind('tanggal', $data['tanggal']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
