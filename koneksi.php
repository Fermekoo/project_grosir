<?php
$db_host = "localhost";
<<<<<<< HEAD
$db_user = "root";
$db_pass = "talingok";
$db_name = "gros";
=======
$db_user = "tega3862_root";
$db_pass = "abcd12345";
$db_name = "tega3862_grosir_update";
>>>>>>> 03e9e0fd1f0433aa53508254f76f42862d22ddb2

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
