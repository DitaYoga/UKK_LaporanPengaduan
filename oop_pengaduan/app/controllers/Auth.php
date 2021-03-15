<?php

class Auth extends Controller
{
    public function index()
    {
        $this->View('auth/index');
    }

    public function register()
    {
        $this->View('auth/register');
    }

    public function prosesLogin()
    {
        $user = $this->model('Auth_model')->userLogin($_POST);
        $petugas = $this->model('Auth_model')->petugasLogin($_POST);
        
        if ($user != null) {
            $_SESSION['user'] = $user;
            $_SESSION['status'] = 'user';
            header('location:' . BASEURL . '/home');
            exit;
        } elseif($petugas != null){
            if ($petugas['level'] == "admin") {
                $_SESSION['petugas'] = $petugas;
                $_SESSION['status'] = 'admin';
                header('location:' . BASEURL . '/home');
                exit;
            } elseif ($petugas['level'] == "petugas") {
                $_SESSION['petugas'] = $petugas;
                $_SESSION['status'] = 'petugas';
                header('location:' . BASEURL . '/home');
                exit;
            }
        }else {
            Pesan::pesanLogin('Username / Password salah', 'Login Gagal!');
            header('location:' . BASEURL . '/auth');
            exit;
        }
    }

    public function prosesRegister()
    {
        if($this->model('Auth_model')->register($_POST) > 0){
            header('location: ' . BASEURL . '/auth');
            exit;
        } else{
            header('location: ' . BASEURL . '/auth/register');
            exit;
        }
    }

}