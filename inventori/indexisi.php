<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../fungsi.php';

$no = 1;
$total = 0;
$query = mysqli_query($koneksi, "SELECT * FROM inventaris");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Inventaris Berbasis Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home.css">
</head>

<body>
<div class="title p-3 bg-primary">
        <h1 class="judul text-center text-warning"> DAFTAR INVENTARIS BARANG</h1>
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
                <a href="<?= base_url('logout.php') ?>" class="btn btn-secondary " style="margin-left: 800px">Logout</a>
        </div>
    </nav>
<div id="wrapper">
				<div class="container-fluid">
                <div class="clearfix">
                <hr>

						<a href="tambah.php" class="btn btn-primary btn-sm float-left"><i class="fas fa-plus"></i> Tambah Data</a>

					</div>
					<hr>
					
					<?php if (check_flash_message('sukses')): ?>
	                    <div class="alert alert-success alert-dismissible fade show" role="alert">
	                        <?php get_flash_message() ?>
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                      </button>
	                    </div>
	                  <?php elseif(check_flash_message('gagal')) : ?>
	                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                        <?php get_flash_message() ?>
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                      </button>
	                    </div>
	                  <?php endif ?>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Nama Barang</th>
											<th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Tanggal Datang</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Harga Satuan</th>
                                            <th>Total Harga</th>
										</tr>
									</thead>
									<tbody>
									<?php while ($inventori = mysqli_fetch_assoc($query)): ?>
                                               <?php $total += $inventori['harga'] * $inventori['jumlah'];?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $inventori['kode_barang'] ?></td>
                                                <td><?php echo str_rot13(base64_decode($inventori['nama_barang'])) ?></td>
                                                <td><?php echo $inventori['jumlah'] ?></td>
                                                <td><?php echo str_rot13(base64_decode($inventori['satuan'])) ?></td>
                                                <td><?php echo $inventori['tgl_datang'] ?></td>
                                                <td><?php echo str_rot13(base64_decode($inventori['kategori'])) ?></td>
                                                <td>
													<?php
														if (str_rot13(base64_decode($inventori['status_barang'])) == 'Baik') {
															?>
																<span class="text-primary">Baik</span>
															<?php
														} elseif (str_rot13(base64_decode($inventori['status_barang'])) == 'Perawatan'){
															?>
																<span class="text-warning">Perawatan</span>
															<?php
														} elseif (str_rot13(base64_decode($inventori['status_barang'])) == 'Rusak'){
															?>
																<span class="text-danger">Rusak</span>
															<?php
														}
													?>
												</td>
                                                <td>Rp <?php echo number_format($inventori['harga']) ?>,00</td>
                                                <td>Rp <?php echo number_format($inventori['harga'] * $inventori['jumlah'])  ?>,00</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
                                    <h3 class="text-right">Total Item yang dimiliki: <?php echo $no - 1 ?></h3>
								</table>
							</div>
                            <h4 class= "text-center">Total Inventaris yang dimiliki: Rp <?php echo number_format($total) ?>,00</h4>
						</div>
					</div>
				</div>
                <div class="footer p-3 bg-primary">
                        <h5 class="judul text-center text-warning"> Inventaris 2022</h5>
                </div>
	</div>
<script src="../data_template/vendor/jquery/jquery.min.js"></script>
<script src="../data_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../data_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../data_template/js/sb-admin-2.min.js"></script>
<script src="../data_template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../data_template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../data_template/js/demo/datatables-demo.js"></script>
</body>
</html>
