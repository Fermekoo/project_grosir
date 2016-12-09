<?php
				error_reporting(0);
				
	
				  /* if(isset($_POST['bayar'])){
				   $id_pelanggan=$_POST['id_pelanggan'];
					 $bayar=$_POST['bayarr'];
					 $kembalian= $bayar - $total;
					 $sql_belanja="INSERT INTO transaksi VALUES('',$id_pelanggan,'$total','$bayar','$kembalian',NOW())";
					 $exe_bel=mysqli_query($koneksi,$sql_belanja);
				   }*/
				   
		
	
			
			
			
			
				
					$sql_idp="SELECT id_pelanggan from pelanggan where nama_pelanggan='$nama_pel'";
					$exe_idp=mysqli_query($koneksi,$sql_idp);
					while($data_idp=mysqli_fetch_assoc($exe_idp)){
						$id_pel=$data_idp['id_pelanggan'];
					}
						
					//$id_pel=$_POST['id_pelanggan'];
					$id =$_POST['getID'];
					$x="select harga_atas_toko from stok_toko where id_toko='$id'";
		$y=mysqli_query($koneksi,$x);
		while($z=mysqli_fetch_array($y)){
			$hrg=$z['harga_atas_toko'];
		}
                 $id =$_POST['getID'];
				 $sid= session_id();
				 //di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
$sql ="SELECT id_barangtoko FROM keranjang WHERE id_barangtoko='$id' AND id_sesion='$sid'";
$exe=mysqli_query($koneksi,$sql);
    $ketemu=mysqli_num_rows($exe);
    if ($ketemu==0){
		
        // kalau barang belum ada, maka di jalankan perintah insert
       $sql_0="INSERT INTO keranjang VALUES ('','$id','$id_pel','1','$hrg','$sid',NOW())";
	   $exe_0=mysqli_query($koneksi,$sql_0);
    } else {
        //  kalau barang ada, maka di jalankan perintah update
        $sql_0u="UPDATE keranjang
                SET jumlah_keranjang = jumlah_keranjang WHERE id_sesion ='$sid' AND id_barangtoko='$id'";
				$exe_0u=mysqli_query($koneksi,$sql_0u) ;      
    }   
   // header('Location:penjualan.php');
   
                
				
                
              ?>