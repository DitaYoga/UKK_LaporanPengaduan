<?php 
class Logout {
    public function index(){
        unset($_SESSION['status']);
        header('location:' . BASEURL . '/login');
        exit;
    }
}