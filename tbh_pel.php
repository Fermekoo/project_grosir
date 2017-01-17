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
							 header('location:penjualan3.php');
							
						}else{
							echo"<div class='alert alert-danger'>
                                        <a class='close' data-dismiss='alert' href='#'>&times;</a>
                                         Data Pelanggan gagal disimpan
                                    </div>";
							
						}

}
 ?>