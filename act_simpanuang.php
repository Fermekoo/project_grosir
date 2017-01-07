<?php
	include "koneksi.php";
	if(isset($_POST['btnHutang'])){
		$id_pel=$_POST['id_pelanggan'];
		$total=$_POST['total'];
		$sql_up="UPDATE pelanggan set saldo='$total' where id_pelanggan='$id_pel'";
		$exe_up=mysqli_query($koneksi,$sql_up);
		header('location:return_barang.php');
	}
?>