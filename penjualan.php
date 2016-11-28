<?php include "header.php";?>
 

            <?php
              include "koneksi.php";
              /*if(isset($_POST['tambah'])){
                 $id =$_POST['getID'];
                 $cek="SELECT * FROM stok_toko, barang where barang.id_gudang=stok_toko.id_gudang and stok_toko.id_gudang = '".$id."'";
               $k=mysqli_query($koneksi,$cek);
                $data=mysqli_fetch_array($k);
     $nama=$data['nama'];
     $harga_atas = $data['harga_atas_toko'];
     $jumlah = 1;
     $totalHarga = $jumlah* $harga_atas;

    
  echo $nm;

                 
              }
			  else{*/
				  
			  
              

            ?>
  <!-- =============================================== -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SELAMAT DATANG
        <small>admin</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->

      
<div class="row">
        <div class="col-md-8">

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><a href="keranjang.php">Penjualan</a></h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
               <form action="" method="post">
                <div class="form-group">
              <div class="ui-widget">
               
                 <div class="input-group input-group-sm">
                    <input type= "text" id="nama_barang" class="form-control" placeholder="Masukkan Nama Barang"  >
                    <input  type="hidden" name="getID" id="result" value="" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat" name="tambah">Tambah</button>
                    </span>
                 </div>
               
                
                 </div>
              </div>
                <!-- <div class="col-xs-4">
                  <button type="submit" name="tambah" class="btn btn-primary btn-block btn-flat">Tambah</button>
                </div> -->
                 
				  
              </form>
               <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
				
                <tr>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
				  <th>Tanggal Belanja</th>
				  
              
                </tr>
                </thead>
                <tbody>
				<?php
				error_reporting(0);
				if(isset($_POST['tambah'])){
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
       $sql_0="INSERT INTO keranjang VALUES ('','$id','1','$hrg' '$sid',NOW())";
	   $exe_0=mysqli_query($koneksi,$sql_0);
    } else {
        //  kalau barang ada, maka di jalankan perintah update
        $sql_0u="UPDATE keranjang
                SET jumlah_keranjang = jumlah_keranjang + 1 ,subtotal = subtotal + '$hrg' WHERE id_sesion ='$sid' AND id_barangtoko='$id'";$exe_0u=mysqli_query($koneksi,$sql_0u) ;      
    }   
   // header('Location:penjualan.php');
   
                
				}
                 
              ?>
			  <?php
			  $sid = session_id();
					$sql_t="SELECT * FROM keranjang, stok_toko, barang where id_sesion='$sid' AND keranjang.id_barangtoko=stok_toko.id_toko AND stok_toko.id_gudang=barang.id_gudang";
					$exe_t=mysqli_query($koneksi,$sql_t);
				
					while($data=mysqli_fetch_array($exe_t)){
						$subtotal = $data['harga_atas_toko'] * $data['jumlah_keranjang'];
						//$total= $total + $subtotal;
			  
			  ?>
                <tr>
                  <td><?php echo $data['nama'];?></td>
                  <td><input type="text" name="jum" value="<?php echo $data['harga_atas_toko'];?>"></td>
                  <td><input type="text" name="qty" value="<?php echo $data['jumlah_keranjang'];?>"></td>
                  <td><?php echo $subtotal;?></td>
				  <td><?php echo $data['tanggal'];?></td>
				  
                </tr>
					<?php } ?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pelanggan</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="" placeholder="Nama pelanggan">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
       <div class="row justify">
  <div class="col-sm-7 col-md-6">
    <div class="thumbnail">
      <div class="caption">
        <label>Hutang</label>
        <h3 class="justify"><font color="#F44336">Rp.50.000</font></h3>
        <!-- <p><a href="#" class="btn btn-primary" role="button">bayar</a></p> -->
      </div>
    </div>
  </div>
  <div class="col-sm-7 col-md-6">
    <div class="thumbnail">
      <div class="caption">
        <label>Total Belanja</label>
         <h3 class="justify"><font color="#2196F3">Rp.50.000</font></h3>
        <!-- <p><a href="#" class="btn btn-primary" role="button">bayar</a></p> -->
      </div>
    </div>
  </div>
</div>

 
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Bayar Hutang</a></li>
              <li><a href="#tab_2" data-toggle="tab">Bayar Belanjaan</a></li>
              <li><a href="#tab_3" data-toggle="tab">Ngutang</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
             <div class="input-group input-group-normal">
                    <input type= "text" id="nama_barang" class="form-control" placeholder="Jumlah"  >
                    <input  type="hidden" name="getID" id="result" value="" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat" name="tambah">Selesaikan Transaksi</button>
                    </span>
                 </div>


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                   <div class="input-group input-group-normal">
                    <input type= "text" id="nama_barang" class="form-control" placeholder="Jumlah"  >
                    <input  type="hidden" name="getID" id="result" value="" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat" name="tambah">Selesaikan Transaksi</button>
                    </span>
                 </div>
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
               <div class="input-group input-group-normal">
                    <input type= "text" id="nama_barang" class="form-control" placeholder="Jumlah ngutang"  >
                    <input  type="hidden" name="getID" id="result" value="" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat" name="tambah">Selesaikan Transaksi</button>
                    </span>
                 </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
         
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        
        <!-- /.col -->
      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- iCheck -->
         
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include "footer.php";?>
<script>
$(function () {
   

   $( "#nama_barang" ).autocomplete({
        source: 'search_toko.php',
        select: function(event, ui) {
          var e = ui.item;
          document.getElementById('result').value = e.id;
          // $("#result").append(result);
      //      var result = "<p>label : " + e.label + " - id : " + e.id + "</p>";
      // $("#result").append(result);
    }

    });

  
  });
</script>
 
  