<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(1);
// echo "<pre>";

//cek status login
session_start();
$_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
if($_SESSION['status']!="login"){
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

require 'tampilan.html';

?>

</body>
</html>