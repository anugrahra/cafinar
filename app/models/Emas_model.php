<?php

class Emas_model
{
  private $table = 'emas',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showTotal()
  {
    $this->db->query("SELECT SUM(berat) AS total FROM " . $this->table);

    return $this->db->single();
  }

  public function showEmas()
  {
    $this->db->query("SELECT * FROM " . $this->table . " ORDER BY id DESC");

    return $this->db->resultSet();
  }

  public function beli($data)
  {
    $query  = "INSERT INTO " . $this->table . " VALUES ('', :berat, :tanggal)";

    $this->db->query($query);
    $this->db->bind('berat', $data['berat']);
    $this->db->bind('tanggal', $data['tanggal']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function jual($id)
  {
    $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
