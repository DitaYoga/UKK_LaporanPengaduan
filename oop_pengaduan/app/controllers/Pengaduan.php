<?php

class Pengaduan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Form Pengaduan';
        $data['verifikasi'] = $this->model('Pengaduan_model')->validasiLaporan();
        $data['proses'] = $this->model('Pengaduan_model')->laporanTervalidasi();
        $data['selesai'] = $this->model('Pengaduan_model')->laporanSelesai();
        $data['pengaduan'] = $this->model('Pengaduan_model')->getPengaduanByNik();
        $data['allPengaduan'] = $this->model('Pengaduan_model')->getAllPengaduan();
        $this->view('templates/header', $data);
        $this->view('pengaduan/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id)
    {
        $data['judul'] = 'Detail Laporan';
        $data['pengaduan'] = $this->model('Pengaduan_model')->getPengaduanById($id);
        $data['tanggapan'] = $this->model('Tanggapan_model')->getTanggapanById($id);
        $this->view('templates/header', $data);
        $this->view('pengaduan/detail', $data);
        $this->view('templates/footer');
    }

    public function verifikasi()
    {
        $data['judul'] = 'Verifikasi Laporan';
        $data['pengaduan'] = $this->model('Pengaduan_model')->validasiLaporan();
        $this->view('templates/header', $data);
        $this->view('pengaduan/verifikasi', $data);
        $this->view('templates/footer');
    }

    public function doVerifikasi()
    {
        if ($this->model('Pengaduan_model')->doVerifikasi($_POST) > 0) {
            header('location: ' . BASEURL . '/pengaduan/verifikasi');
            exit;
        }
    }

    public function proses()
    {
        $data['judul'] = 'Proses Laporan';
        $data['pengaduan'] = $this->model('Pengaduan_model')->laporanTervalidasi();
        $this->view('templates/header', $data);
        $this->view('pengaduan/proses', $data);
        $this->view('templates/footer');
    }

    public function selesai()
    {
        $data['judul'] = 'Laporan Selesai';
        $data['pengaduan'] = $this->model('Pengaduan_model')->laporanSelesai();
        $this->view('templates/header', $data);
        $this->view('pengaduan/selesai', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Pengaduan';
        $this->view('templates/header', $data);
        $this->view('pengaduan/tambah');
        $this->view('templates/footer');
    }

    public function prosesTambah()
    {
        if($this->model('Pengaduan_model')->tambah($_POST) > 0){
            header('location: ' . BASEURL . '/pengaduan');
            exit;
        } else{
            header('location: ' . BASEURL . '/pengaduan');
            exit;
        }
    }
}