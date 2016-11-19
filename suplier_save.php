<?php 
include 'koneksi.php';
$nama=$_POST['nama'];
$rek=$_POST['rekening'];
$hutang=$_POST['hutang'];
$tempo=$_POST['tempo'];


$sql="insert into suplier values('','$nama','$rek','$hutang','$tempo')";
$exe=mysqli_query($koneksi,$sql);

if($exe){
		echo"sukses";
	
}else{
	echo "gagal";
}

header("location:suplier_tbh.php");

 ?>