<?php 
  if($_SESSION['status'] == 'user'){
      header('location:'.BASEURL.'');
  }
?>
<div class="container mt-3">
    <h3>Form Tambah Petugas</h3>
    <form action="<?= BASEURL ?>/petugas/create" method="post" class="mt5">
        <div class="form-group">
            <label for="nama_petugas">Nama Petugas</label>
            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="telp">No telepon</label>
            <input type="number" class="form-control" name="telp" id="telp">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" class="form-control" name="level" id="level" value="Petugas" disabled>
        </div>
        <a href="<? BASEURL ?>/petugas" class="btn btn-outline-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>