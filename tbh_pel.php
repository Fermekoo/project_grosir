<?php 
include 'koneksi.php';
if (isset($_POST['simpan'])){
$nama=$_POST['nama'];
$rek=$_POST['alamat'];
//$hutang=$_POST['hutang'];
$tempo=$_POST['hp'];


$sql="INSERT into pelanggan (nama_pelanggan,alamat,nohp,tanggal) values('$nama','$rek','$tempo',NOW())";

$exe=mysqli_query($koneksi,$sql);
if($exe){
	 $last_id = mysqli_insert_id($koneksi);

							 
// 							  echo "<SCRIPT type='text/javascript'> //not showing me this
//         alert('TIDAK BISA');
  
//     </SCRIPT>";
// header("location:penjualan3.php?id_pelanggan=$last_id");
	 	 echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Pelanggan baru berhasil ditambahkan');
         window.location.replace(\"penjualan3.php?id_pelanggan=$last_id\");
    </SCRIPT>";
							
						}else{
							 echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Pelanggan baru gagal ditambahkan');
         window.location.replace(\"penjualan3.php\");
    </SCRIPT>";
							
						}

}else if (isset($_POST['simpanReturn'])){
$nama=$_POST['nama'];
$rek=$_POST['alamat'];
//$hutang=$_POST['hutang'];
$tempo=$_POST['hp'];


$sql="INSERT into pelanggan (nama_pelanggan,alamat,nohp,tanggal) values('$nama','$rek','$tempo',NOW())";

$exe=mysqli_query($koneksi,$sql);
if($exe){
	 $last_id = mysqli_insert_id($koneksi);

							 
// 							  echo "<SCRIPT type='text/javascript'> //not showing me this
//         alert('TIDAK BISA');
  
//     </SCRIPT>";
// header("location:penjualan3.php?id_pelanggan=$last_id");
	 	 echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Pelanggan baru berhasil ditambahkan');
         window.location.replace(\"return_barang.php?id_pelanggan=$last_id\");
    </SCRIPT>";
							
						}else{
							 echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Pelanggan baru gagal ditambahkan');
         window.location.replace(\"return_barang.php\");
    </SCRIPT>";
							
						}
					}
 ?>