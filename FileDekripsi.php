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
        <?php
                $id = $_GET['id_file'];
                $query = mysqli_query($koneksi,"SELECT * FROM file WHERE id_file='$id'");
                $data2 = mysqli_fetch_array($query);
                $deskripsi = str_rot13(base64_decode($data2['keterangan']));
                ?>
                <h3 align="center">Dekripsi File <i style="color:blue"><?php echo $data2['file_name_finish'] ?></i></h3><br>
                <form method="post" action="ProsesDekripsi.php">
                  <table>
                       <tr>
                         <td>File</td>
                         <td>:</td>
                         <td><?php echo $data2['file_name_source']; ?></td>
                       </tr>
                       <tr>
                         <td>File Enkrip</td>
                         <td>:</td>
                         <td><?php echo $data2['file_name_finish']; ?></td>
                       </tr>
                       <tr>
                         <td>Ukuran File</td>
                         <td>:</td>
                         <td><?php echo $data2['file_size']; ?> KB</td>
                       </tr>
                       <tr>
                         <td>Deskripsi</td>
                         <td>:</td>
                         <td><?php echo $deskripsi; ?></td>
                       </tr>
                       <tr>
                         <td>Masukkan Password Untuk Mendekrip</td>
                         <td></td>
                         <td>
                           <div class="col-md-6">
                            <input type="hidden" name="fileid" value="<?php echo $data2['id_file'];?>">
                           <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pwdfile" required><br>
                           <input type="submit" name="decrypt_now" value="Dekripsi File" class="form-control btn btn-primary">
                         </div>
                       </td>
                       </tr>
                  </table>
              </form>
    <div class="footer p-3 bg-primary">
        <h5 class="judul text-center text-warning"> Inventaris 2022</h5>
    </div>
</body>
</html>