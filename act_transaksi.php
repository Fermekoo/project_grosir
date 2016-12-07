<?php
if(isset($POST['jumlah'])){
	$id_pel=$_POST['getID'];
$jum_bayar=$_POST['jumlah'];
$kembali = $jum_bayar - $total;
$sql_trans="INSERT INTO transaksi VALUES('','$id_pel','$total','$jum_bayar','$kembali',NOW())";
$exe_trans=mysqli_query($koneksi,$sql_trans);
 if($exe_trans){
	 echo"sukses";
	 
 }else{
	 echo "gagal";
 }
}
?>