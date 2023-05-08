<?php
session_start();
include "koneksi.php";   //memasukan koneksi
include "AES.php"; //memasukan file AES

$idfile    = mysqli_escape_string($koneksi, $_POST['fileid']);
$pwdfile   = mysqli_escape_string($koneksi, substr(md5($_POST["pwdfile"]), 0,16));
$query     = "SELECT password FROM file WHERE id_file='$idfile' AND password='$pwdfile'";
$sql       = mysqli_query($koneksi,$query);
if(mysqli_num_rows($sql)>0){
    $query1     = "SELECT * FROM file WHERE id_file='$idfile'";
    $sql1       = mysqli_query($koneksi,$query1);
    $data       = mysqli_fetch_assoc($sql1);

    $file_path  = $data["file_url"];
    $key        = $data["password"];
    $file_name  = $data["file_name_source"];
    $size       = $data["file_size"];

    $file_size  = filesize($file_path);

    $query2     = "UPDATE file SET status='2' WHERE id_file='$idfile'";
    $sql2       = mysqli_query($koneksi,$query2);

    $mod        = $file_size%16;

    $aes        = new AES($key);
    $fopen1     = fopen($file_path, "rb");
    $plain      = "";
    $cache      = "file_dekripsi/$file_name";
    $fopen2     = fopen($cache, "wb");

    if($mod==0){
    $banyak = $file_size / 16;
     }else{
    $banyak = ($file_size - $mod) / 16;
    $banyak = $banyak+1;
    }

    ini_set('max_execution_time', -1);
    ini_set('memory_limit', -1);
    for($bawah=0;$bawah<$banyak;$bawah++){

      $filedata    = fread($fopen1, 16);
      $plain       = $aes->decrypt($filedata);
      fwrite($fopen2, $plain);
   }
   $_SESSION["download"] = $cache;

   echo("<script language='javascript'>
       window.location.href='DeskripsiFile.php';
       window.alert('Berhasil mendekripsi file.');
       </script>
       ");
}else{
 echo("<script language='javascript'>
    window.location.href='decrypt-file.php?id_file=$idfile';
    window.alert('Maaf, Password tidak sesuai.');
    </script>");
}
?>