<?php
include 'koneksi.php';
  $select_pel="SELECT * FROM pelanggan where id_pelanggan='28'";
            $exe_pel=mysqli_query($koneksi,$select_pel);
            while($dat_pel=mysqli_fetch_assoc($exe_pel)){
            
              
           $htg = $dat_pel['hutang'];
            

            }

echo $htg;
           
 ?>