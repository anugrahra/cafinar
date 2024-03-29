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

  public function showTotalPemasukanByBulan($data = [])
  {
    if (isset($data['tahun'])) {
      $explode = explode('|', $data['bulan']);
      $bulan = $explode[0];
      $tahun = $data['tahun'];
    } else {
      $bulan = (int)date('m');
      $tahun = (int)date('Y');
    }

    $this->db->query("SELECT SUM(nominal) AS total FROM " . $this->table . "
    WHERE MONTH(tanggal) = :bulan
    AND
    YEAR(tanggal) = :tahun
    ORDER BY tanggal DESC");

    $this->db->bind('bulan', $bulan);
    $this->db->bind('tahun', $tahun);

    return $this->db->single();
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

  public function showPemasukanPerBulan()
  {
    $this->db->query("SELECT MONTHNAME(tanggal) AS month, SUM(nominal) AS nominal FROM " . $this->table . " WHERE YEAR(tanggal) = YEAR(CURRENT_DATE()) GROUP BY YEAR(tanggal), MONTH(tanggal)");

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

  public function tambahfromcicil($data)
  {
    $query  = "INSERT INTO " . $this->table . " VALUES ('', :tanggal, :nominal, :sumber, :keterangan)";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tglcicil']);
    $this->db->bind('nominal', $data['jumlahcicilan']);
    $this->db->bind('sumber', $data['sumber']);
    $this->db->bind('keterangan', $data['keterangan']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function defaultPemasukanPerHari()
  {
    $this->db->query("SELECT DAY(tanggal) AS day, SUM(nominal) AS nominal FROM " . $this->table . "
    WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
    AND
    YEAR(tanggal) = YEAR(CURRENT_DATE())
    GROUP BY YEAR(tanggal), MONTH(tanggal), DAY(tanggal)");

    return $this->db->resultSet();
  }

  public function showPemasukanPerHari($data)
  {
    $this->db->query("SELECT DAY(tanggal) AS day, SUM(nominal) AS nominal FROM " . $this->table . "
    WHERE MONTH(tanggal) = :bulan
    AND
    YEAR(tanggal) = :tahun
    GROUP BY YEAR(tanggal), MONTH(tanggal), DAY(tanggal)");

    $this->db->bind('bulan', $data['bulan']);
    $this->db->bind('tahun', $data['tahun']);

    return $this->db->resultSet();
  }
}
