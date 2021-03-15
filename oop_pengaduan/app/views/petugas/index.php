<?php 
  if($_SESSION['status'] == 'user'){
      header('location:'.BASEURL.'');
  }
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
        <h3><i class="fas fa-user-friends"></i> Daftar Data Petugas</h3>
        <hr class="bg-secondary">
        <?php
                if (isset($_SESSION['pesan'])) {
                    Pesan::getPesan();
                }
            ?>
        <br>
        <a href="<?= BASEURL ?>/petugas/store" class="btn btn-primary btn-sm mb-2">
            <i class="fa fa-plus"></i> Data
        </a>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>No Telp</th>
                <th>Level</th>
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach($data['petugas'] as $p) : ?>
                    <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama_petugas'] ?></td>
                    <td><?= $p['username'] ?></td>
                    <td><?= $p['telp'] ?></td>
                    <td><?= $p['level'] ?></td>
                    <td class="text-center">
                        <a href="<?= BASEURL; ?>/petugas/edit/<?= $p['id_petugas'] ?>" class="btn btn-warning btn-sm mr-2 text-white"><i class="fa fa-pencil-alt"></i></a>
                        <a href="<?= BASEURL; ?>/petugas/delete/<?= $p['id_petugas'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?');"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>