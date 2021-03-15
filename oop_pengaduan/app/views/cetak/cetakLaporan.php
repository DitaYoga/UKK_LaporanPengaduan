<?php 
  if($_SESSION['status'] == 'user'){
      header('location:'.BASEURL.'');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan Masyarakat</title>
    
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/font-awesome/css/all.min.css">

    <style>
        @media print{
            #printButton{
                display:none;
            }
        }

        .hilang{
            position: absolute;
        }
    </style>
</head>
<body class="text-secondary">
    
    <div class="container-fluid mt-3">
        <a href="<?= BASEURL ?>/cetak" id="printButton" class="btn btn-outline-primary btn-sm hilang" style="left:20px; top:8px"><i class="fas fa-long-arrow-alt-left"></i></a>
        <button id="printButton" onclick="window.print()" class="btn btn-success btn-sm hilang" style="left:60px; top:8px"><i class="fas fa-print"></i> Print</button>
        
        <center>
            <h2 class="m-0">PEMERINTAH KABUPATEN BADUNG</h2>
            <h4 class="m-0">DESA DARMASABA KEC. ABIANSEMAL</h4>
            <h6 class=" m-0 mb-4" style="font-size: 14px;">Jalan Raya Darmasaba Desa Darmasaba Kode Pos 80352</h6>
            <br>
            <hr>
            <h5 class="text-center mb-5">Laporan Pengaduan Masyarakat</h5>
        </center>
        
        <?php
            $from = date('d F Y', strtotime($_POST['tgl_awal']));
            $to = date('d F Y', strtotime($_POST['tgl_akhir']));
            $filter = $_POST['filter'];

                echo '
                    <table class="mb-4">
                        <tr>
                            <th>Nama Petugas</th>
                            <td> : </td>
                            <td>'. $_SESSION['petugas']['nama_petugas'] .'</td>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <td> : </td>
                ';
                                if($filter == 'Month' || $filter == 'Year'){
                                    echo '<td>Last '. $filter .'</td>';
                                } elseif($filter == 'All'){
                                    echo '<td>'. $filter .'</td>';
                                } else{
                                    echo '<td>'. $from .' - '. $to .'</td>';
                                }
                '
                        </tr>
                    </table>
                ';
        ?>
        <table class="table small">
            <thead class="text-secondary">
                <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th width="109px">Tgl Laporan</th>
                    <th width="112px">Judul</th>
                    <th width="300px">Isi Laporan</th>
                    <th width="120px">Petugas</th>
                    <th width="115px">Tgl Tanggapan</th>
                    <th>Tanggapan</th>
                </tr>
            </thead>
            <?php
                $no = 1;
                foreach($data['cetak'] as $p) : ?>
            <tbody>
                <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nik'] ?></td>
                <td><?= date('d F Y', strtotime($p['tgl_pengaduan'])) ?></td>
                <td><?= $p['judul_laporan'] ?></td>
                <td><?= $p['isi_laporan'] ?></td>
                <td><?= $p['nama_petugas'] ?></td>
                <td><?= date('d F Y', strtotime($p['tgl_tanggapan'])) ?></td>
                <td><?= $p['tanggapan'] ?></td>
                </tr>
            </tbody>
            <?php endforeach ?>
        </table>
        <br>
        <div class="row float-right w-25 text-center mt-5 mb-5">
            <div class="col-sm-12">
                <p class="">Denpasar, <?= date('d-m-Y') ?></p>
            </div>
            <div class="col-sm-12 mt-n3 mb-5">
                <p class="">Petugas, </p>
            </div>
            <div class="col-sm-12 text-center">
                <p class=""><?= $_SESSION['petugas']['nama_petugas'] ?></p>
            </div>
        </div>
    </div>
</body>
</html>