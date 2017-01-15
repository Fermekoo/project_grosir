<?php
	include "koneksi.php";
	if(isset($_POST['btnHutang'])){
		$id_pel=$_POST['id_pelanggan'];
		$total=$_POST['total'];
		$idsesion = $_POST['idsesion'];
		
		$sql_up="UPDATE pelanggan set saldo='$total' where id_pelanggan='$id_pel'";
		$exe_up=mysqli_query($koneksi,$sql_up);
			$sql="delete from return_barang where id_sesion='$idsesion'";
$exe=mysqli_query($koneksi,$sql);
		header('location:return_barang.php');
	}
?>