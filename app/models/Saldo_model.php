<?php

class Saldo_model
{
  private $table = 'saldo',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showSaldo()
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id = 1");

    return $this->db->single();
  }

  public function masuk($data)
  {
    $saldo = $this->showSaldo();
    $saldo = $saldo['saldo'];

    if (isset($data['narik'])) {
      if ($data['narik'] != 0) {
        $data['nominal'] = $data['narik'];
      }
    } else if (isset($data['jual'])) {
      if ($data['jual'] != 0) {
        $data['nominal'] = $data['jual'];
      }
    }

    $query  = "UPDATE " . $this->table . " SET saldo = ($saldo + :pemasukan), tanggal = :tanggal WHERE id = 1";

    $this->db->query($query);
    $this->db->bind('pemasukan', $data['nominal']);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function keluar($data)
  {
    $saldo = $this->showSaldo();
    $saldo = $saldo['saldo'];

    if (isset($data['nabung'])) {
      if ($data['nabung'] != 0) {
        $data['nominal'] = $data['nabung'];
      }
    } else if (isset($data['invest'])) {
      if ($data['invest'] != 0) {
        $data['nominal'] = $data['invest'];
      }
    }

    $query  = "UPDATE " . $this->table . " SET saldo = ($saldo - :pengeluaran), tanggal = :tanggal WHERE id = 1";

    $this->db->query($query);
    $this->db->bind('pengeluaran', $data['nominal']);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->execute();

    return $this->db->rowCount();
  }
}
