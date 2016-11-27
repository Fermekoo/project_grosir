<?php 
include "koneksi.php";
$searchTerm = $_GET['term'];
$cek="SELECT * FROM stok_toko, barang where barang.id_gudang=stok_toko.id_gudang and barang.nama LIKE '%".$searchTerm."%'";
$k=mysqli_query($koneksi,$cek);
 while ($row = $k->fetch_assoc()) {
        $data[] = array(
        	"id"=>$row['id_gudang'],
        	"label"=>$row['nama']);
    }
    

    //return json data
    echo json_encode($data);
?>