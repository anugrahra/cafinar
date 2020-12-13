<?php

class Login_model
{
  private $table = 'akun',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getUser($data)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
    $this->db->bind('username', $data['username']);
    return $this->db->single();
  }

  public function signin($data)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
    $this->db->bind('username', $data['username']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function deleteUser($id)
  {
    $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
