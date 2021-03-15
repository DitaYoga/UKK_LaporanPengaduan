<?php

class Home extends Controller 
{
    public function index()
    {
        $data["judul"] = "Dashboard";
        $data['pengaduan'] = $this->model('Pengaduan_model')->getAllPengaduan();
        $data['petugas'] = $this->model('Petugas_model')->getAllPetugas();
        $data['masyarakat'] = $this->model('Masyarakat_model')->getAllMasyarakat();
        $data['pengaduanByNik'] = $this->model('Pengaduan_model')->getPengaduanByNik();
        $data['tanggapan'] = $this->model('Cetak_model')->filterData();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
    public function profile()
    {
      $data['judul'] = 'Profile';
      $this->view('templates/header', $data);
      $this->view('home/profile');
      $this->view('templates/footer');
    }
}
