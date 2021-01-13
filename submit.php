<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(1);
// echo "<pre>";

//cek status login
session_start();
if($_SESSION['status']!="login"){
	header("location:login.php?pesan=belum_login");
	$setLogin = 'login.php';
	$setUser = 'Log in';
	$setDownload = '#';
	$setOnclick = '';
} else {
$setLogin = 'logout.php';
$setUser = 'Log out'; 
$setDownload = 'generatePDF';
$setOnclick = "return confirm('Are You sure you want to logout?');";
}


$dir    = 'audit';
$daftardraft = scandir($dir,1);
$daftar = array();
$idaftar = 0;
for ($i=0; $i < sizeof($daftardraft); $i++) { 
	if ($daftardraft[$i]!=="."&&$daftardraft[$i]!=="..") {
		$daftar[$idaftar] = array(
			'id' => base64_encode($daftardraft[$i]),
			'text' => $daftardraft[$i]
		);
		$idaftar++;

	}
}

// print_r($daftar);

//membuat array untuk memanggil file
$report=$_GET['report'];
$namafile='audit/'.base64_decode($report);
$data = array();

if (!empty($report) && file_exists($namafile)) {
	// mulai skrip
	$file = fopen($namafile,"r");

	$hitung = 0;
	// Menyimpan data dari teks ke dalam array
	while(! feof($file)) {
	  // echo fgets($file). "<br />";
		$data[$hitung] = fgets($file);
		$hitung++;
	}
	fclose($file);
}



// var_dump($data);
// Memecah array string menjadi kolom2
$judul = '';
$hostname = 'Hostname is null';
$tanggal = '00 00:00:00';
$server1 = '';
$server2 = '';
$work1 = '';
$work2 = '';
$nserver1 = '';
$nserver2 = '';
$nwork1 = '';
$nwork2 = '';
$baris = array();
$ibaris = 0;
for ($i=0; $i < sizeof($data); $i++) { 
	if ($i === 0) {
		$judul = $data[$i];
	}
	if ($i === 2) {
		$hostname = explode(' : ', $data[$i])[1];
	}
	if ($i === 3) {
		$tanggal = explode(' : ', $data[$i])[1];
	}
	if ($i >= 5) {
		// echo $data[$i]. "<br />";
		$kolom = explode(' - ', $data[$i]);
		if (sizeof($kolom) === 3) {
			$baris[$ibaris] = array(
				'status' => $kolom[0],
				'kode' => $kolom[1],
				'deskripsi' => $kolom[2]
			);
			$ibaris++;
		}
	}
	if ($i === 233) {
		$server1 = explode(' = ', $data[$i])[1];
	}
	if ($i === 234) {
		$server2 = explode(' = ', $data[$i])[1];
	}
	if ($i === 238) {
		$work1 = explode(' = ', $data[$i])[1];
	}
	if ($i === 239) {
		$work2 = explode(' = ', $data[$i])[1];
	}
	if ($i === 243) {
		$nserver1 = explode(' = ', $data[$i])[1];
	}
	if ($i === 244) {
		$nserver2 = explode(' = ', $data[$i])[1];
	}
	if ($i === 248) {
		$nwork1 = explode(' = ', $data[$i])[1];
	}
	if ($i === 249) {
		$nwork2 = explode(' = ', $data[$i])[1];
	}
}



// var_dump($data);
// var_dump($baris);

// Menghitung status
$pass = 0;
$fail = 0;
$error = 0;
for ($j=0; $j < sizeof($baris); $j++) { 
	if ($baris[$j]['status'] === 'FAIL') {
		$fail++;
	} else if ($baris[$j]['status'] === 'PASS') {
		$pass++;
	} else {
		$error++;
	}
}

$point = '';
for ($h=0; $h < sizeof($baris) ; $h++) { 

}
$persen = 0;
$persen = $pass/223*100;

// echo $persen;
require 'tampilan.html';

?>

</body>
</html>