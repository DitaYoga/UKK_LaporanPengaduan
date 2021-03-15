<?php

class Cetak_model
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTanggal()
    {
        $this->db->query("SELECT * FROM pengaduan ORDER BY tgl_pengaduan ASC LIMIT 1");
        return $this->db->single();
    }

    public function cetakData()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $tgl_awal = $_POST["tgl_awal"];
        $tgl_akhir = $_POST["tgl_akhir"];

        $this->db->query("SELECT nik,tgl_pengaduan,judul_laporan,isi_laporan,nama_petugas,tgl_tanggapan,tanggapan 
        FROM pengaduan,tanggapan,petugas 
        WHERE pengaduan.id_pengaduan=tanggapan.id_pengaduan 
        AND tanggapan.id_petugas=petugas.id_petugas 
        AND tgl_pengaduan BETWEEN '$tgl_awal' AND '$tgl_akhir' 
        ORDER BY tgl_pengaduan ASC");
        
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function filterData()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $filter = $_POST["filter"];
        if($filter == "Month"){
            $this->db->query("SELECT MONTH(tgl_pengaduan) AS bulan, nik, tgl_pengaduan, judul_laporan, isi_laporan, nama_petugas, tgl_tanggapan, tanggapan 
                FROM pengaduan 
                INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan 
                INNER  JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas
                WHERE MONTH(tgl_pengaduan)=MONTH(NOW()) ORDER BY tgl_pengaduan ASC");

        }elseif($filter == "Year"){
            $this->db->query("SELECT YEAR(tgl_pengaduan) AS tahun, nik, tgl_pengaduan, judul_laporan, isi_laporan, nama_petugas, tgl_tanggapan, tanggapan 
                FROM pengaduan 
                INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan 
                INNER  JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas
                WHERE YEAR(tgl_pengaduan)=YEAR(NOW()) ORDER BY tgl_pengaduan ASC");

        } else{
            $this->db->query("SELECT * FROM cetakLaporan");
        }
        
        $this->db->execute();
        return $this->db->resultSet();
    }
}