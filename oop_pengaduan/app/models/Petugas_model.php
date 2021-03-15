<?php

class Petugas_model
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPetugas()
    {
        $this->db->query('SELECT * FROM petugas');
        return $this->db->resultSet();
    }

    public function create($data)
    {
        $nama_petugas = $data["nama_petugas"];
        $username = $data["username"];
        $password = md5($data["password"]);
        $telp = $data["telp"];
        $level = 'petugas';
        $this->db->query("INSERT INTO petugas VALUE('','$nama_petugas','$username','$password','$telp','$level')");

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($id)
    {
        $this->db->query("SELECT * FROM petugas WHERE id_petugas ='$id'");
        return $this->db->single();
    }

    public function update($data)
    {
        $id = $data['id_petugas'];
        $nama_petugas = $data["nama_petugas"];
        $username = $data["username"];
        $password = md5($data["password"]);
        $telp = $data["telp"];
        $this->db->query("UPDATE petugas Set nama_petugas='$nama_petugas', username='$username', password='$password', telp='$telp' WHERE id_petugas='$id'");

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM petugas WHERE id_petugas='$id'");

        $this->db->execute();
        return $this->db->rowCount();
    }
}