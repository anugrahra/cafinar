<?php

class Piutang_model
{
  private $table = 'piutang',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showTotal()
  {
    $this->db->query("SELECT SUM(nominal) AS total FROM " . $this->table);

    return $this->db->single();
  }

  public function showCurrentMonthPiutang()
  {
    $this->db->query("SELECT * FROM " . $this->table . "
     WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
     AND
     YEAR(tanggal) = YEAR(CURRENT_DATE())
     ORDER BY tanggal DESC");

    return $this->db->resultSet();
  }

  public function getPiutangByDate($data)
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

  public function showPiutangByDate($data)
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
    $query  = "INSERT INTO " . $this->table . " VALUES ('', :tanggal, :nominal, :debitur, :keterangan)";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('nominal', $data['nominal']);
    $this->db->bind('debitur', $data['debitur']);
    $this->db->bind('keterangan', $data['keterangan']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function dibayar($data)
  {
    $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $data['id']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ikhlaskan($id)
  {
    $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
