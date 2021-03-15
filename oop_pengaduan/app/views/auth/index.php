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
    <title>Halaman Login</title>

    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/font-awesome/css/all.min.css">
</head>
<body>

    <div class="container-fluid" style="margin-top:100px">
        <form action="<?= BASEURL ?>/auth/prosesLogin" method="post" class="m-auto shadow pl-5 pr-5 pb-4 pt-4" style="width:400px">
            <h3 class="text-center mb-3">Form Login</h3>

            <?php
                if (isset($_SESSION['pesan'])) {
                    Pesan::getLogin();
                }
            ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control shadow-sm" type="text" name="username" required autocomplete="off" autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control shadow-sm" type="password" name="password" required>
            </div>
                
                <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                <p class="text-center mt-2">Dont't have an account?<a href="<?= BASEURL ?>/auth/register"> Register</a></p>
        </form>
    </div>

</body>
</html>
