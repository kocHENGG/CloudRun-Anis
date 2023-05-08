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
                    <a class="nav-link" href="<?= base_url('DekripsiFile.php') ?>">Dekripsi File</a>
                </li>
                 <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('InputFile.php') ?>">Input File</a>
                </li>
            </ul>
                <a href="./logout.php" class="btn btn-secondary " style="margin-left: 800px">Logout</a>
        </div>
    </nav>
    <main class="container text-center" style="height:76vh;">
    <div id = "wrapper">
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
     <thead>
         <tr>
             <th>No</th>
             <th>File</th>
             <th>File enkrip</th>
             <th>Path File</th>
             <th>Aksi</th>
         </tr>
     </thead>
     <tbody>
         <?php
         $i = 1;
                    $query = mysqli_query($koneksi,"SELECT * FROM file");
                    while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $data['file_name_source']; ?></th>
                    <th><?php echo $data['file_name_finish']; ?></th>
                    <th><?php echo $data['file_url']; ?></th>
                    <th>
                        <?php
                        if ($data['status'] == 1) {
                            ?><a href=FileDekripsi.php?id_file=<?php echo $data['id_file'];?>><button>Dekripsi</button></a><?php
                        }
                        else if ($data['status'] == 2) {
                            ?><a href=InputFile.php><button>Enkripsi</button></a><?php
                        }?>
                    </th>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
     </tbody>
 </table>
 </div>
    </main>
    <div class="footer p-3 bg-primary">
        <h5 class="judul text-center text-warning"> Inventaris 2022</h5>
    </div>
</body>
</html>