<?php
require_once 'session.php';
require_once 'koneksi.php';
require_once 'fungsi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "select * from petugas where username='$username' and password='$password'";
    $hasil= mysqli_query($koneksi,$query);
    if($hasil>0){
        $row = mysqli_fetch_assoc($hasil);
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
        header("location:./dashboard.php");
    }
    else{
        echo("Login Gagal");
        header("location:./login.php?msg=loginfail");
    }
?>