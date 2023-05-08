<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../fungsi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">  
    <title><?= $_SESSION['app_name'] ?> - Tambah Data</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../data_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../data_template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../data_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="title p-3 bg-primary">
        <h1 class="judul text-center text-light m-0"> Daftar Inventaris Barang</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
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
                <a href="<?= base_url('logout.php') ?>" class="btn btn-light ">Logout</a>
        </div>
    </nav>
	<div id="wrapper">
	<div class="container-fluid">
					<div class="clearfix"><br>
						<h1 class="h3 mb-4 text-gray-800 float-left">Tambah Data Inventori</h1>
					</div>
                    <hr>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<span class="text-primary"><strong>Silahkan isi data berikut!!!</strong></span>
								</div>
								<div class="card-body">
                                <form method="POST" action="proses_tambah.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputkode">Kode Barang</label>
                        <input name="kode" type="text" class="form-control shadow" id="exampleInputkode" placeholder="Masukkan Kode Barang">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnama">Nama Barang</label>
                        <input name="nama" type="text" class="form-control shadow" id="exampleInputnama" placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputjumlah">Jumlah</label>
                        <input name="jumlah" type="text" class="form-control shadow" id="exampleInputjumlah" placeholder="Masukkan Jumlah">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputsatuan">Satuan</label>
                        <input name="satuan" type="text" class="form-control shadow" id="exampleInputsatuan" placeholder="Masukkan Satuan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdate">Tanggal Masuk</label>
                        <input name="date" type="date" class="form-control shadow" id="exampleInputdate" aria-describedby="dateHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputjudul">Kategori</label>
                        <select name="kategori" class="custom-select">
                            <option selected disabled>List per kategori</option>
                            <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                            <option value="Bangunan">Bangunan</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Kendaraan">Kendaraan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputjudul">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="Baik" checked>
                            <label class="form-check-label" for="status1">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="Perawatan" checked>
                            <label class="form-check-label" for="status2">
                                Perawatan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status3" value="Rusak" checked>
                            <label class="form-check-label" for="status3">
                                Rusak
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputharga">Harga Satuan</label>
                        <input name="harga" type="text" class="form-control shadow" id="exampleInputharga" placeholder="Masukkan harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <a class="nav-link" href="<?= base_url('inventori/proses_tambah.php') ?>"><button type="submit" class="btn btn-outline-primary" >Submit</button></a>
                </div>
            </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer p-3 bg-primary">
        <h5 class="judul text-center text-light m-0"> Daftar Inventaris Barang Kantor Serba Ada</h5>
    </div>
		</div>
	</div>
	
<script src="../data_template/vendor/jquery/jquery.min.js"></script>
<script src="../data_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../data_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../data_template/js/sb-admin-2.min.js"></script>
</body>
</html>
