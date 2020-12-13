<?php

class Pemasukan_model
{
  private $table = 'pemasukan',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showCurrentMonthPemasukan()
  {
    $this->db->query("SELECT * FROM " . $this->table . "
     WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
     AND
     YEAR(tanggal) = YEAR(CURRENT_DATE())
     ORDER BY tanggal DESC");

    return $this->db->resultSet();
  }

  public function getPemasukanByDate($data)
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

  public function showPemasukanByDate($data)
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

  public function tambah($data)
  {
    $query  = "INSERT INTO " . $this->table . " VALUES ('', :tanggal, :nominal, :sumber, :keterangan)";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('nominal', $data['nominal']);
    $this->db->bind('sumber', $data['sumber']);
    $this->db->bind('keterangan', $data['keterangan']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
