<?php 
  if($_SESSION['status'] != 'user' && $_SESSION['status'] != 'admin' && $_SESSION['status'] != 'petugas'){
      header('location:'.BASEURL.'/auth');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $data["judul"]; ?></title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/font-awesome/css/all.min.css">
  </head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand text-white ml-n2" href="<?= BASEURL ?>">Pengaduan Masyarakat</a>
        <?php
          if($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'petugas'){
            echo '<a href="'. BASEURL .'/home/profile" class="text-white">'. $_SESSION['petugas']['username'] .' <i class="fas fa-user"></i></a>';
          } else{
            echo '<a href="'. BASEURL .'/home/profile" class="text-white">'. $_SESSION['user']['username'] .' <i class="fas fa-user"></i></a>';
          }
        ?>
    </div>
  </nav>

  <div class="row no-gutters mt-5">
      <div class="col-md-2 bg-dark mt-5 pr-3 pt-4 fixed-top shadow-lg" style="min-height:600px;">
        <ul class="nav flex-column ml-2">
          <li class="nav-item">
            <a class="nav-link text-white active" aria-current="" href="<?= BASEURL ?>"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
            <hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASEURL; ?>/pengaduan"><i class="fas fa-list-alt mr-2"></i> Laporan</a>
          </li>
          <?php
            if($_SESSION['status']=='admin'){
              echo '<li class="nav-item">
                <a class="nav-link text-white" href="' . BASEURL . '/petugas"><i class="fas fa-user-friends mr-2"></i> Petugas</a>
              </li>';
              echo '<li class="nav-item">
                <a class="nav-link text-white" href="' . BASEURL . '/masyarakat"><i class="fas fa-users mr-2"></i> Masyarakat</a>
              </li>';
          }
          if($_SESSION['status'] == 'admin' || $_SESSION['status']=='petugas'){
            echo '<li class="nav-item">
                <a class="nav-link text-white" href="' . BASEURL . '/cetak"><i class="fas fa-print mr-2"></i> Generate Laporan</a>
              </li>';
          }
          ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASEURL; ?>/logout"><i class="fas fa-sign-out-alt  mr-2"></i> Logout</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 mt-3" style="margin-left:210px">
        <div class="container">
