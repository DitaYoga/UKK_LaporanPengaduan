<?php

class Pengaduan_model
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengaduan()
    {
        $this->db->query("SELECT * FROM pengaduan ORDER BY status ASC");
        return $this->db->resultSet();
    }

    public function getPengaduanById($id)
    {
        $this->db->query("CALL getPengaduan($id)");
        return $this->db->single();
    }

    public function validasiLaporan()
    {
        $this->db->query("CALL getPengaduanByStatus('0')");
        return $this->db->resultSet();
    }

    public function laporanTervalidasi()
    {
        $this->db->query("CALL getPengaduanByStatus('proses')");
        return $this->db->resultSet();
    }

    public function laporanSelesai()
    {
        $this->db->query("CALL getPengaduanByStatus('selesai')");
        return $this->db->resultSet();
    }

    public function doVerifikasi($data)
    {
        $id = $data['id_pengaduan'];
        $this->db->query("UPDATE pengaduan SET status='proses' WHERE id_pengaduan='$id'");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function doProses($data)
    {
        $id = $data['id_pengaduan'];
        $this->db->query("UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id'");
        $this->db->execute();
        return $this->db->rowCount();
    }

    //Masyarakat
    public function getPengaduanByNik()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $nik = $_SESSION['user']['nik'];

        $this->db->query("SELECT * FROM pengaduan WHERE nik='$nik' ORDER BY status ASC");
        return $this->db->resultSet();
    }

    public function tambah($data)
    {
        $gambar = $_FILES['foto']['name'];
        $namaSementara = $_FILES['foto']['tmp_name'];
        $file_name = date('Y-m-d')."_".$gambar;
        $tujuan_upload = "img/";
        move_uploaded_file($namaSementara, $tujuan_upload.$file_name);

        $tgl_pengaduan = date('Y-m-d');
        $nik = $_SESSION['user']['nik'];
        $judul_laporan = $data["judul_laporan"];
        $isi_laporan = $data["isi_laporan"];
        $foto = $file_name;
        $status = "0";
        $this->db->query("INSERT INTO pengaduan VALUE('', '$tgl_pengaduan', '$nik', '$judul_laporan', '$isi_laporan', '$foto', '$status')");
    
        $this->db->execute();
        return $this->db->rowCount();
    }

}