<?php include "header.php";?>
 <?php 

 include 'koneksi.php';
 $nama_pelanggan = "nama pelanggan";
if (isset($_POST['btnBayar'])) {
            $id_pelanggan = $_POST['id_pelanggan'];
            $jum_bayar=$_POST['jum_bayar'];
            $total = $_POST['total'];
            $hutang = $_POST['hutang'];
            $kembali = $jum_bayar - $total ;


             $tunai = "Rp. ".number_format($jum_bayar);
             $totalPembelian = "Rp. ".number_format($total);
             $sisa = "Rp. ".number_format($kembali);

         $sql_trans="INSERT INTO transaksi VALUES('','$id_pelanggan','$total','$jum_bayar','$kembali',NOW())";
$exe_trans=mysqli_query($koneksi,$sql_trans);
  
	//Kalau bayar semua otomatis hutang juga dibayar
  $sql_0u="UPDATE pelanggan
                SET hutang = '0' where id_pelanggan = '$id_pelanggan'";
        $exe_0u=mysqli_query($koneksi,$sql_0u) ;   
          
           } 

           $sql_pel="SELECT * FROM pelanggan
               where id_pelanggan = '$id_pelanggan'";
        $exe_pel=mysqli_query($koneksi,$sql_pel) ; 
        while($row=mysqli_fetch_assoc($exe_pel)){
		
		$nama_pelanggan=$row['nama_pelanggan'];
	}
         









 ?>
  <div class="content-wrapper" id="printableArea">
<style type="text/css">
	@page {
  size: auto;  /* auto is the initial value */
  margin: 2mm; /* this affects the margin in the printer settings */
}
html {
  
}
body {
  
  
}
</style>
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Detail Pembelian
            <small class="pull-right">Tanggal: <?php echo date("d/m/Y "); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
         Di jual Oleh:
          <address>

            <strong>Teguh jaya</strong><br>
            Jln. soekarno Hatta<br>
            Bandung 37161<br>
            Phone: (804) 123-5432<br>
            Email: teguhjaya@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Pelanggan:
          <address>
            <strong><?php echo $nama_pelanggan; ?></strong><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Faktur #007612</b><br>
          <br>
          <b>Transaksi ID:</b> 4F3S8J<br>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
             
              <th>Barang</th>
             <th>Qty</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>

             <?php 
           $no=1;
	
	$ql_trans="SELECT * from transaksi order by id_transaksi DESC limit 0,1";
	$exe_trans=mysqli_query($koneksi,$ql_trans);
	while($row=mysqli_fetch_array($exe_trans)){
		
		$id_trans=$row['id_transaksi'];
	}
	
	
	$sql="SELECT * FROM transaksi, pelanggan, keranjang, barang, stok_toko where transaksi.id_transaksi='$id_trans' AND transaksi.id_pelanggan=pelanggan.id_pelanggan AND keranjang.id_pelanggan=transaksi.id_pelanggan AND keranjang.id_barangtoko=stok_toko.id_toko AND stok_toko.id_gudang=barang.id_gudang";
	
	$exe_sql=mysqli_query($koneksi,$sql);
	while($lihat=mysqli_fetch_array($exe_sql)){
		$id_pel=$lihat['id_pelanggan'];
		$tgl = $lihat['tgl_transaksi'];
		$barang = $lihat['nama'];
		$nama_pelanggan = $lihat['nama_pelanggan'];
		$qty = $lihat['jumlah_keranjang'];
		$subtotal =$lihat['harga_akhir'];
		$harga_akhir = "Rp. ".number_format($lihat['harga_akhir']);
		$hutang_tampil = "Rp. ".number_format($lihat['hutang']);
		?>
              <td><?php echo $barang; ?></td>
              <td><?php echo $qty; ?></td>
              <td><?php echo $harga_akhir; ?></td>
            </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Tanggal Transaksi:<?php echo date("d/m/Y "); ?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total:</th>
                <td><?php echo $totalPembelian; ?></td>
              </tr>
              <tr>
                <th>Tunai</th>
                <td><?php echo $tunai; ?></td>
              </tr>
              <tr>
                <th>Kembalian</th>
                <td><?php echo $sisa; ?></td>
              </tr>
              <tr>
                <th>Sisa Hutang</th>
                <td><?php echo $hutang_tampil; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="javascript:print()"  class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</a>
 
         
         
        </div>
		
		<form action="" method="post"><br>
		<div class="">
        <div class="col-xs-12">
          <a class="btn btn-primary pull-right" href="act_selesai.php?id_pel=<?php echo $id_pel;?>">Selesaikan Transaksi</a>
 
         
         
        </div>
      </div>
	  <form>
    </section>
      <div class="clearfix"></div>
    </div>
    <?php include "footer.php";?>
   
    <script type=application/javascript>document.links[0].href="data:text/html;charset=utf-8,"+encodeURIComponent('<!doctype html>'+document.documentElement.outerHTML)</script>