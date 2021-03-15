<?php 
  if($_SESSION['status'] == 'user'){
      header('location:'.BASEURL.'');
  }
?>
    <div class="container mt-3">
        <h3>Daftar Laporan Pengaduan Masyarakat</h3>
        <hr class="bg-secondary">
        <br>
        <form class="form-inline mb-3" action="<?= BASEURL ?>/cetak" method="post">
            <div class="form-group">
                <label for="tgl_awal" class="font-weight-bold">From</label>
                <input type="date" class="form-control form-control-sm ml-1 mr-2" name="tgl_awal" id="tgl_awal" value="<?= $_POST['tgl_awal'] ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_akhir" class="font-weight-bold">To</label>
                <input type="date" class="form-control form-control-sm ml-1 mr-2" name="tgl_akhir" id="tgl_akhir" value="<?= $_POST['tgl_akhir'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
        <form action="<?= BASEURL ?>/cetak" method="post" class="form-inline mb-3">
            <div class="form-group mr-2">
                <label for="filter" class="font-weight-bold">Filter Data</label>
                <select name="filter" id="filter" class="form-control form-control-sm ml-1">
                    <option value="All">All</option>
                    <option value="Month">Last Month</option>
                    <option value="Year">Last Year</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
        <form action="<?= BASEURL ?>/cetak/cetakData" method="post">
            <?php
                $filter = $_POST['filter'];
                if($filter){
                    echo '
                        <input type="hidden" name="filter" value="'. $filter .'">
                    ';
                }elseif($_POST['tgl_awal'] == '' && $_POST['tgl_akhir'] == ''){
                    echo '
                        <input type="hidden" class="form-control form-control-sm ml-1 mr-2" name="tgl_awal" id="tgl_awal" value="'. $data['tanggal']['tgl_pengaduan'] .'">
                        <input type="hidden" class="form-control form-control-sm ml-1 mr-2" name="tgl_akhir" id="tgl_akhir" value="'. date('Y-m-d') .'">    
                    ';
                } else{
                    echo '
                        <input type="hidden" class="form-control form-control-sm ml-1 mr-2" name="tgl_awal" id="tgl_awal" value="'. $_POST['tgl_awal'] .'">
                        <input type="hidden" class="form-control form-control-sm ml-1 mr-2" name="tgl_akhir" id="tgl_akhir" value="'. $_POST['tgl_akhir'] .'">
                    ';
                }
            ?>
            <button type="submit" name="print" class="btn btn-success btn-sm mb-2"><i class="fas fa-print"></i> Preview Cetak</button>
        </form>
        <table class="table small">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th style="width:109px">Tgl Laporan</th>
                    <th style="width:100px">Judul</th>
                    <th style="width:320px">Isi Laporan</th>
                    <th>Petugas</th>
                    <th width="112px">Tgl Tanggapan</th>
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
            <?php endforeach; ?>
        </table>
    </div>