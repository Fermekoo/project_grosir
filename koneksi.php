<?php
$db_host = "localhost";
$db_user = "tega3862_root";
$db_pass = "abcd12345";
$db_name = "tega3862_grosir_update";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
