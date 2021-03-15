<?php
class Pesan{
    public static function setPesan($pesan,$aksi,$tipe)
    {
        $_SESSION['pesan']=[
            'pesan'=> $pesan,
            'aksi'=> $aksi,
            'tipe'=> $tipe
        ];
    }

    public static function getPesan()
    {
        if(isset($_SESSION['pesan'])){
            echo '
            <div class="alert alert-'.$_SESSION['pesan']['tipe'].' pt-2 pb-2">
                <strong>'.$_SESSION['pesan']['tipe'].'</strong> '.$_SESSION['pesan']['pesan'].' '.$_SESSION['pesan']['aksi'].'
            </div>
            ';
        }
        unset($_SESSION['pesan']);
    }

    public static function pesanLogin($pesan,$tipe)
    {
        $_SESSION['pesan']=[
            'pesan'=> $pesan,
            'tipe'=> $tipe,
        ];
    }

    public static function getLogin()
    {
        if(isset($_SESSION['pesan'])){
            echo '
            <div class="alert alert-danger ml-n3 mr-n3 pt-1 pb-1">
                <strong>'.$_SESSION['pesan']['tipe'].'</strong> '.$_SESSION['pesan']['pesan'].'
            </div>
            ';
        }
        unset($_SESSION['pesan']);
    }
}