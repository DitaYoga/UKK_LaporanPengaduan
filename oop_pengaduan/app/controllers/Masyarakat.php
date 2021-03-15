<?php

class Masyarakat extends Controller 
{
  public function index()
  {
    $data["judul"] = 'Daftar Data Masyarakat';
    $data["masyarakat"] = $this->model('Masyarakat_model')->getAllMasyarakat();
    $this->view('templates/header', $data);
    $this->view('masyarakat/index', $data);
    $this->view('templates/footer');
  }

  public function delete($id)
  {
    if ($this->model('Masyarakat_model')->delete($id) > 0) {
      header('Location: ' . BASEURL . '/masyarakat');
      exit;
    } else {
      header('Location: ' . BASEURL . '/masyarakat');
      exit;
    }
  }
}
