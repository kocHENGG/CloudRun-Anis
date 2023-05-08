<?php
//untuk memanggil file yang dibutuhkan
    require_once 'session.php';
    require_once 'fungsi.php';
    if (!isset($_SESSION['auth'])) {
        set_flash_message('gagal','Anda Harus Login Terlebih Dahulu!!!');
        header('Location: login.php');
    }
    header('Location: dashboard.php');
?>