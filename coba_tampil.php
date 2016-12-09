<?php

	include"koneksi.php";
	$ql_trans="SELECT * from transaksi order by id_transaksi DESC limit 0,1";
	$exe_trans=mysqli_query($koneksi,$ql_trans);
	while($row=mysqli_fetch_array($exe_trans)){
		
		$id_trans=$row['id_transaksi'];
	}
	
	
	$sql="SELECT * FROM transaksi, pelanggan, keranjang where transaksi.id_transaksi='$id_trans' AND transaksi.id_pelanggan=pelanggan.id_pelanggan AND keranjang.id_pelanggan=pelanggan.id_pelanggan";
	
	$exe_sql=mysqli_query($koneksi,$sql);
	while($data=mysqli_fetch_array($exe_sql)){
		$nama=$data['nama_pelanggan'];
		$barang=$data['id_barangtoko'];
		
	}
	echo $nama;
	echo $barang;
?>