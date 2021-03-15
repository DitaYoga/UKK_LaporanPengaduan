<?php 
class Auth_model
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function petugasLogin($data){
        $username = $data["username"];
        $password = md5($data["password"]);
        $this->db->query("SELECT * FROM petugas WHERE username='$username' && password='$password'");
        return $this->db->single();
    }

    public function userLogin($data){
        $username = $data["username"];
        $password = md5($data["password"]);
        $this->db->query("SELECT * FROM masyarakat WHERE username='$username' && password='$password'");
        return $this->db->single();
    }

    public function register($data)
    {
        $nik = $data["nik"];
        $nama = $data["nama"];
        $username = $data["username"];
        $password = md5($data["password"]);
        $telp = $data["telp"];
        $level = "user";
        $this->db->query("INSERT INTO masyarakat VALUES('$nik', '$nama','$username', '$password', '$telp', '$level')");

        $this->db->execute();
        return $this->db->rowCount();
    }
}