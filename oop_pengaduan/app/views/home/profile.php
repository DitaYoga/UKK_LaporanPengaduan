
<div class="container mt-3">
    <h3><i class="fas fa-user"></i> Data Profile</h3>
    <hr class="bg-secondary">
    <br>
    <?php
        if($_SESSION['status'] == 'user'){
            echo '
                <form action="<?= BASEURL ?>/masyarakat/update" method="post">
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="number" name="nik" id="nik" class="form-control" value="'. $_SESSION['user']['nik'] .'" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="'. $_SESSION['user']['nama'] .'" required disabled autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="'. $_SESSION['user']['username'] .'" required disabled autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="'. $_SESSION['user']['password'] .'" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="'. $_SESSION['user']['telp'] .'" required disabled>
                    </div>
                    <a href="<?= BASEURL ?>" class="btn btn-outline-secondary">Kembali</a>
                    <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                </form><br><br>
            ';
        } else{
            echo '
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="'. $_SESSION['petugas']['nama_petugas'] .'" required disabled autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="'. $_SESSION['petugas']['username'] .'" required disabled autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="'. $_SESSION['petugas']['password'] .'" required disabled>
                </div>
                <div class="form-group">
                    <label for="telp">No Telp</label>
                    <input type="number" name="telp" id="telp" class="form-control" value="'. $_SESSION['petugas']['telp'] .'" required disabled>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <input type="text" name="level" id="level" class="form-control" value="'. $_SESSION['petugas']['level'] .'" required disabled>
                </div>
                <a href="<?= BASEURL ?>" class="btn btn-outline-secondary">Kembali</a>
                <br><br>
            ';
        }
    ?>
</div>