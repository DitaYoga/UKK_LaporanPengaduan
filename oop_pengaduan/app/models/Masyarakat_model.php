<?php

class Masyarakat_model 
{  
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllMasyarakat()
  {
    $this->db->query('SELECT * FROM masyarakat');
    return $this->db->resultSet();
  }

  public function getMasyarakatById($id)
  {
    $this->db->query("SELECT * FROM masyarakat WHERE nik ='$id'");
    return $this->db->single();
  }

  public function delete($id)
  {
    $this->db->query("DELETE FROM masyarakat WHERE nik='$id'");
    $this->db->execute();
    return $this->db->rowCount();
  }
}