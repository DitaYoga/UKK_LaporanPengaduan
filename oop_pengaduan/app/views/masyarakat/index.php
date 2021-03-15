<?php 
  if($_SESSION['status'] != 'admin' && $_SESSION['status'] != 'petugas'){
      header('location:'.BASEURL.'');
  }
?>
<div class="container mt-3">
  <div class="row">
    <div class="col">
      <h3><i class="fa fa-users"></i> Daftar Data Masyarakat</h3>
      <hr class="bg-secondary">
      <br>
      <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Nik</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Telp</th>
              <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; 
            foreach($data['masyarakat'] as $m) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $m['nik'] ?></td>
                <td><?= $m['nama'] ?></td>
                <td><?= $m['username'] ?></td>
                <td><?= $m['telp'] ?></td>
                <td class="text-center">
                    <a href="<?= BASEURL; ?>/masyarakat/delete/<?= $m['nik'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?');"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>