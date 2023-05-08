<?php
require_once 'session.php';
require_once 'koneksi.php';
require_once 'fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">  
    <title><?= $_SESSION['app_name'] ?> - Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="data_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="data_template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="title p-3 bg-primary">
        <h1 class="judul text-center text-warning"> DAFTAR INVENTARIS BARANG</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('dashboard.php') ?>">Beranda</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('inventori/indexisi.php') ?>">Daftar Inventaris</a>
                </li>
                 <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('DeskripsiFile.php') ?>">Dekripsi File</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('InputFile.php') ?>">Input File</a>
                </li>
            </ul>
                <a href="./logout.php" class="btn btn-secondary " style="margin-left: 800px">Logout</a>
        </div>
    </nav>
    <main class="container text-center" style="height:76vh;">
    <br><br><br><br><br><br><br><br>
        <h3 class="judul" style="font-size: 70px;">Selamat datang</h3>
            <h1 class="text-success" style="font-size: 70px;"><?php echo $_SESSION['nama_lengkap']?></h1>
    </main>
    <div class="footer p-3 bg-primary">
        <h5 class="judul text-center text-warning"> Inventaris 2022</h5>
    </div>
</body>
</html>