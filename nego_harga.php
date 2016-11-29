 <?php
 include 'koneksi.php';

				$idk=$_POST['id_keranjang'];
                 
                 $harga = $_POST['harga'];
             
            
         
            $sqlu="UPDATE keranjang set harga_akhir='$harga' where id_keranjang='".$idk."'";
			$exeu=mysqli_query($koneksi,$sqlu);
			//echo "oke";
          

     //           if ($k == true) {
     //           	# code...
     //           	  echo "Thank you " . $jumlah;
     //           }else{
					// echo "Update gagal";
     //           }

         
         ?>