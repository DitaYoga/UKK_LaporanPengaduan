<?php

class Tanggapan extends Controller
{
    public function index($id)
    {
        $data['judul'] = "Form Data Tanggapan";
        $data['pengaduan'] = $this->model('Pengaduan_model')->getPengaduanById($id);
        $data['tanggapan'] = $this->model('Tanggapan_model')->getTanggapanById($id);
        $this->view('templates/header', $data);
        $this->view('tanggapan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Tanggapan_model')->prosesTanggapan($_POST) > 0 && $this->model('Pengaduan_model')->doProses($_POST) > 0){
            header('location: '. BASEURL .'/pengaduan/selesai');
            exit;
        } else{
            header('location: '. BASEURL .'/pengaduan/proses');
            exit;
        }
    }
}