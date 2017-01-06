<?php 
session_start();
include "koneksi.php";
$sid = session_id();
$qty=$_GET['qty'];
 
 
//di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
$sql ="SELECT id_produk FROM keranjang WHERE id_barangtoko='$_GET[id]' AND session_id='$sid'";
$exe=mysqli_query($koneksi,$sql);
    $ketemu=mysqli_num_rows($exe);
    if ($ketemu==0){
        // kalau barang belum ada, maka di jalankan perintah insert
       $sql_0="INSERT INTO keranjang VALUES (NULL,'$_GET[id]','$qty', '$sid',NOW())";
	   $exe_0=mysqli_query($koneksi,$sql_0);
    } else {
        //  kalau barang ada, maka di jalankan perintah update
        $sql_0u="UPDATE keranjang
                SET jumlah_barang = jumlah + $qty
                WHERE session_id ='$sid' AND id_barangtoko='$_GET[id]'";$exe_0u=mysqli_query($koneksi,$sql_0u) ;      
    }   
    header('Location:keranjang.php');
 
?>