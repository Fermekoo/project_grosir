<?php 
include 'koneksi.php';
$id=$_GET['id'];
$sid=session_id();
$sql="delete from keranjang where id_keranjang='$id'";
$exe=mysqli_query($koneksi,$sql);
header("location:penjualan.php");

?>