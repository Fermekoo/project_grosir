 <?php
 include 'koneksi.php';

    
                 $id =$_POST['id_keranjang'];
                 $jumlah = $_POST['jumlah_barang'];
                 $cek="UPDATE keranjang set jumlah_keranjang= '$jumlah'
                  WHERE id_keranjang = '".$id."'";
               $k=mysqli_query($koneksi,$cek);
               if ($k == true) {
               	# code...
               	  echo "Thank you " . $jumlah;
               }else{
					echo "Update gagal";
               }

         
         ?>