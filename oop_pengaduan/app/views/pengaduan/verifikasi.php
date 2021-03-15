<?php 
  if($_SESSION['status'] == 'user'){
      header('location:'.BASEURL.'');
  }
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-5">
            <h3><i class="fas fa-list-alt"></i> Daftar Laporan Pengaduan</h3>
        </div>
        <div class="col" style="margin-top:7px; margin-left:-55px">
            <span class="badge badge-danger">Belum Terverifikasi</span>
        </div>
    </div>
    <hr class="bg-secondary">
    <br>
    <a href="<?= BASEURL ?>/pengaduan" class="btn btn-outline-primary mb-2">Kembali</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tgl Laporan</th>
                <th>Nik</th>
                <th>Judul Laporan</th>
                <th>Isi Laporan</th>
                <th class="text-center">status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
            $no = 1;
            foreach($data['pengaduan'] as $p) : ?>
        <tbody>
            <tr>
            <td><?= $no++ ?></td>
            <td><?= date('d F Y', strtotime($p["tgl_pengaduan"])) ?></td>
            <td><?= $p['nik'] ?></td>
            <td><?= $p['judul_laporan'] ?></td>
            <td><?= (str_word_count($p["isi_laporan"]) > 10 ? substr($p["isi_laporan"],0,47)."..." : $p["isi_laporan"]) ?></td>
            <td class="text-center" style="font-size:13pt"><span class="badge badge-danger"><?= $p['status'] ?></span></td>
            <td class="text-center">
                <a href="<?= BASEURL ?>/pengaduan/detail/<?= $p['id_pengaduan'] ?>" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</a></div>
            </td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>