<?php include "header.php";?>
 

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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Grosir</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
			  
			  
          </div>
        </div>
        <div class="box-body">
         
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			<?php
				$sql_select="SELECT COUNT(*) FROM transaksi";
				$exe_select=mysqli_query($koneksi,$sql_select);
				$row=mysqli_fetch_row($exe_select);
			?>
              <h3><?php echo $row[0];?></h3>

              <p>Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php
				$jum_notif="SELECT jum_minimal from notif where id=1";
			  $exe_jum=mysqli_query($koneksi,$jum_notif);
			 while($b=mysqli_fetch_assoc($exe_jum)){
				 $ab=$b['jum_minimal'];
			 }
			 $sql_selectbrg="SELECT COUNT(jumlah) FROM barang where jumlah<='$ab'";
			 $exe_brg=mysqli_query($koneksi,$sql_selectbrg);
			 $row1=mysqli_fetch_row($exe_brg);
			?>
              <h3><?php echo $row1[0];?></h3>

              <p>Periksa Stok Barang Gudang</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="tampil_barang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php
				$jum_notif="SELECT jum_minimal from notif where id=1";
			  $exe_jum=mysqli_query($koneksi,$jum_notif);
			 while($b=mysqli_fetch_assoc($exe_jum)){
				 $ab=$b['jum_minimal'];
			 }
			 $sql_selectbrg="SELECT COUNT(jumlah_toko) FROM stok_toko where jumlah_toko<='$ab'";
			 $exe_brg=mysqli_query($koneksi,$sql_selectbrg);
			 $row1=mysqli_fetch_row($exe_brg);
			?>
              <h3><?php echo $row1[0];?></h3>

              <p>Periksa Stok Barang Toko</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="toko_tampil.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			<?php
				$sql_pel="SELECT COUNT(*) FROM pelanggan";
				$exe_pel=mysqli_query($koneksi,$sql_pel);
				$row2=mysqli_fetch_row($exe_pel);
			?>
              <h3><?php echo $row2[0];?></h3>

              <p>Pelanggan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="pelanggan_tampil.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include "footer.php";?>
 
 