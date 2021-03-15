<?php 
  if($_SESSION['status'] == 'user'){
      header('location:'.BASEURL.'');
  }
?>
<div class="container mt-3">
    <h3>Form Edit Data Petugas</h3>
    <hr class="bg-secondary">
        <form action="<?= BASEURL ?>/petugas/update" method="post">
            <div class="form-group">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" value="<?= $data['petugas']['nama_petugas'] ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?= $data['petugas']['username'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="<?= $data['petugas']['password'] ?>">
            </div>
            <div class="form-group">
                <label for="telp">No telepon</label>
                <input type="number" class="form-control" name="telp" id="telp" value="<?= $data['petugas']['telp'] ?>">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" class="form-control" name="level" id="level" value="<?= $data['petugas']['level'] ?>" disabled>
            </div>
            <a href="<?= BASEURL ?>/petugas"><button type="button" class="btn btn-outline-secondary">Kembali</button></a>
            <input type="hidden" name="id_petugas" value="<?= $data['petugas']['id_petugas'] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
</div>