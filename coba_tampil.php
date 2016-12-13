
<table border="1">
<tr>
	<td>NO</td>
	<td>Barang</td>
	<td>Jumlah</td>
	<td>Harga</td>
</tr>
<?php

	include"koneksi.php";
	error_reporting(0);
	$ql_trans="SELECT * from transaksi order by id_transaksi DESC limit 0,1";
	$exe_trans=mysqli_query($koneksi,$ql_trans);
	while($row=mysqli_fetch_array($exe_trans)){
		
		$id_trans=$row['id_transaksi'];
	}
	
	
	$sql="SELECT * FROM transaksi, pelanggan, keranjang, barang, stok_toko where transaksi.id_transaksi='$id_trans' AND transaksi.id_pelanggan=pelanggan.id_pelanggan AND keranjang.id_pelanggan=transaksi.id_pelanggan AND keranjang.id_barangtoko=stok_toko.id_toko AND stok_toko.id_gudang=barang.id_gudang";
	
	$exe_sql=mysqli_query($koneksi,$sql);
	while($data=mysqli_fetch_array($exe_sql)){
		$nama=$data['nama_pelanggan'];
		$barang=$data['id_barangtoko'];
		$nama_barang=$data['nama'];
		$jumlah_brg=$data['jumlah_keranjang'];
		$jumlah_bayar=$data['jumlah_bayar'];
		$kebalian=$data['kembalian'];
		$total +=$data['harga_akhir'];
		
		?>
		
		
		<tr>
			<td><?php echo $barang?></td>
			<td><?php echo $nama_barang?></td>
			<td><?php echo $jumlah_brg?></td>
			<td><?php echo $data['harga_akhir'];?></td>
		
	
	<?php } 
	
?>

</tr>
	<tr>
	<td>Pembeli: <?php echo $nama;?></td>
	<td>Total: <?php echo $total;?></td>
	<td>Bayar: <?php echo $jumlah_bayar;?></td>
	<td>Kembalian: <?php echo $kebalian;?></td>
	</tr>	
		</table>