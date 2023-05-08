<?php 

function base_url($path = null){
	$base_url = "http://localhost/responsi/";
	if($path == null){
		return $base_url;
	} else {
		$base_url = $base_url . $path;
		return $base_url;
	}
}

function set_flash_message($tipe, $pesan){
	$_SESSION['flash_message'] = [
		'tipe' => $tipe,
		'pesan' => $pesan,
	];
}

function check_flash_message($tipe){
	if(isset($_SESSION['flash_message'])){
		if($_SESSION['flash_message']['tipe'] == $tipe) return TRUE;
		else return false;
	} else return false;
}

function get_flash_message(){
	echo $_SESSION['flash_message']['pesan'];
	unset($_SESSION['flash_message']);
}

function upload(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah ada gambar yang diupload
		if($error === 4){ 
			echo "
				<script>
					alert('gambar belum diinput!');
					document.location.href = 'index.php';
				</script>
			";
			return false;
		}

	// cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

	// adakah sebuah string dalam sebuah array 
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "
				<script>
					alert('yang anda upload bukan gambar!');
					document.location.href = 'index.php';
				</script>
			";
			return false;
		}

	// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

	// lolos pengecekan, gambar siap diupload
		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
		return $namaFileBaru;
}
?>