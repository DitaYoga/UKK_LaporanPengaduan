<?php

class Petugas extends Controller
{
    public function index()
    {
        $data["judul"] = 'Daftar Data Petugas';
        $data["petugas"] = $this->model('Petugas_model')->getAllPetugas();
        $this->view('templates/header', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data['judul'] = 'Form Tambah Data Petugas';
        $this->view('templates/header', $data);
        $this->view('petugas/tambah');
        $this->view('templates/footer');
    }

    public function create()
    {
        if($this->model('Petugas_model')->create($_POST) > 0){
            Pesan::setPesan('Data Petugas berhasil', 'diTambahkan', 'success');
            header('location: ' . BASEURL . '/petugas');
            exit;
        } else{
            Pesan::setPesan('Data Petugas gagal', 'diTambahkan', 'danger');
            header('location: ' . BASEURL . '/petugas');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data Petugas';
        $data['petugas'] = $this->model('Petugas_model')->edit($id);
        $this->view('templates/header', $data);
        $this->view('petugas/edit', $data);
        $this->view('templates/header');
    }

    public function update()
    {
        if($this->model('Petugas_model')->update($_POST) > 0){
            Pesan::setPesan('Data Petugas berhasil', 'diUpdate', 'success');
            header('location: ' . BASEURL . '/petugas');
            exit;
        } else{
            Pesan::setPesan('Data Petugas gagal', 'diUpdate', 'danger');
            header('location: ' . BASEURL . '/petugas');
            exit;
        }
    }

    public function delete($id)
    {
        if($this->model('petugas_model')->delete($id) > 0){
            Pesan::setPesan('Data Petugas berhasil', 'diHapus', 'success');
            header('location: ' . BASEURL . '/petugas');
            exit;
        } else{
            Pesan::setPesan('Data Petugas gagal', 'diHapus', 'danger');
            header('location: ' . BASEURL . '/petugas');
            exit;
        }
    }
}