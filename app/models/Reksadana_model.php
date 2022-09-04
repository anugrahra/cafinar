<?php

class Reksadana_model
{
  private $table = 'reksadana',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showTotal()
  {
    $this->db->query("SELECT SUM(invest) - SUM(jual) AS total FROM " . $this->table);

    return $this->db->single();
  }

  public function showCurrentMonthReksadana()
  {
    $this->db->query("SELECT * FROM " . $this->table . "
    WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
    AND
    YEAR(tanggal) = YEAR(CURRENT_DATE())
    ORDER BY tanggal DESC");

    return $this->db->resultSet();
  }

  public function getReksadanaByDate($data)
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

  public function showReksadanaByDate($data)
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
    $query  = "INSERT INTO " . $this->table . " VALUES ('', :tanggal, :invest, :jual, :keterangan)";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('invest', $data['invest']);
    $this->db->bind('jual', $data['jual']);
    $this->db->bind('keterangan', $data['keterangan']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
