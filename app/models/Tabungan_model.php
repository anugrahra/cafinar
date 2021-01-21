<?php

class Tabungan_model
{
  private $table = 'tabungan',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showTotal()
  {
    $this->db->query("SELECT SUM(nabung) - SUM(narik) AS total FROM " . $this->table);

    return $this->db->single();
  }

  public function showCurrentMonthTabungan()
  {
    $this->db->query("SELECT * FROM " . $this->table . "
     WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
     AND
     YEAR(tanggal) = YEAR(CURRENT_DATE())
     ORDER BY tanggal DESC");

    return $this->db->resultSet();
  }

  public function getTabunganByDate($data)
  {
    $explode = explode('|', $data['bulan']);
    $bulan = $explode[0];

    $query = "SELECT * FROM " . $this->table . "
     WHERE MONTH(tanggal) = :bulan
     AND
     YEAR(tanggal) = :tahun
     ORDER BY tanggal DESC";

    $this->db->query($query);
    $this->db->bind('bulan', $bulan);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function showTabunganByDate($data)
  {
    $query = "SELECT * FROM " . $this->table . "
     WHERE MONTH(tanggal) = :bulan
     AND
     YEAR(tanggal) = :tahun
     ORDER BY tanggal DESC";

    $this->db->query($query);
    $this->db->bind('bulan', $data['bulan']);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function transfer($data)
  {
    $query  = "INSERT INTO " . $this->table . " VALUES ('', :tanggal, :nabung, :narik, :keterangan)";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('nabung', $data['nabung']);
    $this->db->bind('narik', $data['narik']);
    $this->db->bind('keterangan', $data['keterangan']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
