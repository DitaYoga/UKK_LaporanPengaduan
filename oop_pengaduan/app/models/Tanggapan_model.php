<?php

class Tanggapan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTanggapanById($id)
    {
        $this->db->query("SELECT *, nama_petugas FROM tanggapan, petugas WHERE id_pengaduan='$id' AND tanggapan.id_petugas=petugas.id_petugas");
        return $this->db->single();
    }

    public function prosesTanggapan($data)
    {
        $id_pengaduan = $data['id_pengaduan'];
        $tgl_tanggapan = date('Y-m-d');
        $tanggapan = $data['tanggapan']; 
        $id_petugas = $_SESSION['petugas']['id_petugas'];

        $this->db->query("INSERT INTO tanggapan VALUE('', '$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");

        $this->db->execute();
        return $this->db->rowCount();
    }
}
