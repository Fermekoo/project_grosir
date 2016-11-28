 <?php
 include 'koneksi.php';

    
                 $id =$_POST['id_toko'];
                 $harga = $_POST['harga'];
              $sql_t="SELECT * FROM stok_toko where id_toko='$id'";

          $exe_t=mysqli_query($koneksi,$sql_t);
       while($data=mysqli_fetch_assoc($exe_t)){
        // var_dump($data['harga_atas_toko']);
          $hargaBawah= $data['harga_bawah_toko'];

          
          }
          // echo $hargaBawah;
          if ($harga < $hargaBawah ) {
            echo "Sorry";
          }else{
            echo "Oke";
          }

          

     //           if ($k == true) {
     //           	# code...
     //           	  echo "Thank you " . $jumlah;
     //           }else{
					// echo "Update gagal";
     //           }

         
         ?>