<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../fungsi.php';
$kode = $_POST["kode"];
$nama = base64_encode(str_rot13($_POST["nama"]));
$jumlah = $_POST["jumlah"];
$satuan = base64_encode(str_rot13($_POST["satuan"]));
$date = $_POST["date"];
$kategori = base64_encode(str_rot13($_POST["kategori"]));
$status = base64_encode(str_rot13($_POST["status"]));
$harga = $_POST["harga"];

$query = "INSERT INTO inventaris (kode_barang, nama_barang, jumlah, satuan, tgl_datang, kategori, status_barang, harga) VALUES('$kode','$nama','$jumlah','$satuan','$date','$kategori','$status','$harga')";
$hasil = mysqli_query($koneksi, $query);
if ($hasil) {
    header("location:./indexisi.php");
} else {
    header("location:./tambah.php");
}
?>