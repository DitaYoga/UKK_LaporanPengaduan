<?php
    error_reporting(E_ALL ^ E_NOTICE);
    if($_SESSION['status']){
        header('location:'.BASEURL.'/home');
    }                
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Register</title>

    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/font-awesome/css/all.min.css">
</head>
<body>

    <div class="container-fluid mt-5">
        <form action="<?= BASEURL ?>/auth/prosesRegister" method="post" class="m-auto shadow pl-5 pr-5 pb-4 pt-4" style="width:485px">
        <h3 class="text-center mb-4">Form Register</h3>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input class="form-control shadow-sm" type="number" name="nik" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input class="form-control shadow-sm" type="number" name="telp" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control shadow-sm" type="text" name="nama" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control shadow-sm" type="text" name="username" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control shadow-sm" type="password" name="password" required>
            </div>
                
                <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                <p class="text-center mt-2">Already have an account?<a href="<?= BASEURL ?>/auth"> Login</a></p>
        </form>
    </div>

</body>
</html>
