<?php 
session_start();
include "koneksi.php";
$sid = session_id();
$id_brg=$_GET['id'];
 
 $x="select * from stok_toko where id_toko='$id_brg'";
    $y=mysqli_query($koneksi,$x);
    while($z=mysqli_fetch_array($y)){
      $hrg=$z['harga_atas_toko'];
    $jum=$z['jumlah_toko'];
    //$jum_tot= $jum - 1;
    }
 
//di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
$sql ="SELECT id_produk FROM keranjang WHERE id_barangtoko='$_GET[id]' AND session_id='$sid'";
$exe=mysqli_query($koneksi,$sql);
    $ketemu=mysqli_num_rows($exe);
    if ($ketemu==0){
        // kalau barang belum ada, maka di jalankan perintah insert
       $sql_0="INSERT INTO keranjang VALUES (NULL,'$id_brg','$id_pelanggan','1','$hrg','$hrg','$hrg','0','$sid',NOW())";
	   $exe_0=mysqli_query($koneksi,$sql_0);
    } else {
        //  kalau barang ada, maka di jalankan perintah update
        $sql_0u="UPDATE keranjang
                SET jumlah_barang = jumlah + $qty
                WHERE session_id ='$sid' AND id_barangtoko='$_GET[id]'";$exe_0u=mysqli_query($koneksi,$sql_0u) ;      
    }   
    header('Location:penjualan3.php');
 
?>