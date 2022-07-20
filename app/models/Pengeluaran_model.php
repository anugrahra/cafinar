<?php

class Pengeluaran_model
{
  private $table = 'pengeluaran',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showCurrentMonthPengeluaran()
  {
    $this->db->query("SELECT * FROM " . $this->table . "
     WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
     AND
     YEAR(tanggal) = YEAR(CURRENT_DATE())
     ORDER BY tanggal DESC");

    return $this->db->resultSet();
  }

  public function showTotalPengeluaranByBulan($data = [])
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

  public function defaultPengeluaranPerHari()
  {
    $this->db->query("SELECT DAY(tanggal) AS day, SUM(nominal) AS nominal FROM " . $this->table . "
    WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
    AND
    YEAR(tanggal) = YEAR(CURRENT_DATE())
    GROUP BY YEAR(tanggal), MONTH(tanggal), DAY(tanggal)");

    return $this->db->resultSet();
  }

  public function showPengeluaranPerHari($data)
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

  public function showPengeluaranPerBulan()
  {
    $this->db->query("SELECT MONTHNAME(tanggal) AS month, SUM(nominal) AS nominal FROM " . $this->table . " WHERE YEAR(tanggal) = YEAR(CURRENT_DATE()) GROUP BY YEAR(tanggal), MONTH(tanggal)");

    return $this->db->resultSet();
  }

  public function showPengeluaranPerKategori()
  {
    $this->db->query("SELECT MONTHNAME(tanggal) AS month, SUM(nominal) AS nominal FROM " . $this->table . " WHERE YEAR(tanggal) = YEAR(CURRENT_DATE()) GROUP BY kategori");

    return $this->db->resultSet();
  }

  public function getPengeluaranByDate($data)
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

  public function showPengeluaranByDate($data)
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
    $query  = "INSERT INTO " . $this->table . " VALUES ('', :tanggal, :nominal, :kategori, :tujuan, :keterangan)";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('nominal', $data['nominal']);
    $this->db->bind('kategori', $data['kategori']);
    $this->db->bind('tujuan', $data['tujuan']);
    $this->db->bind('keterangan', $data['keterangan']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
