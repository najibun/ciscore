<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(1);
// echo "<pre>";

//cek status login
session_start();
if($_SESSION['status']!="login"){
	$setLogin = 'login.php';
	$setUser = 'Log in';
} else {
$setLogin = 'logout.php';
$setUser = 'Log out'; 
}
require 'contact.html';
?>

</body>
</html>