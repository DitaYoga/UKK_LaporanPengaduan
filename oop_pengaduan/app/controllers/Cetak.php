<?php

class Cetak extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Laporan Pengaduan Masyarakat';
        $filter = $this->model('Cetak_model')->filterData($_POST);
        $filterTanggal = $this->model('Cetak_model')->cetakData($_POST);
        if($filterTanggal != null){
            $data['cetak'] = $this->model('Cetak_model')->cetakData();
            $this->view('templates/header', $data);
            $this->view('cetak/index', $data);
            $this->view('templates/footer');
        } elseif ($filter != null) {
            $data['cetak'] = $this->model('Cetak_model')->filterData($_POST);
            $data['tanggal'] = $this->model('Cetak_model')->getTanggal();
            $this->view('templates/header', $data);
            $this->view('cetak/index', $data);
            $this->view('templates/footer');
        }
    }

    public function cetakData()
    {
        $filter = $this->model('Cetak_model')->filterData($_POST);
        $filterTanggal = $this->model('Cetak_model')->cetakData($_POST);
        if ($filterTanggal != null) {
            $data['cetak'] = $this->model('Cetak_model')->cetakData();
            $this->view('cetak/cetakLaporan', $data);
        }elseif ($filter != null) {
            $data['cetak'] = $this->model('Cetak_model')->filterData();
            $data['tanggal'] = $this->model('Cetak_model')->getTanggal();
            $this->view('cetak/cetakLaporan', $data);
        }
    }
}