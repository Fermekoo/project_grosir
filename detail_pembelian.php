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
             if ($jum_bayar < $total) {
          $tambahHutang = $total-$jum_bayar;
            $sql_0u="UPDATE pelanggan
            SET hutang = '$tambahHutang' where id_pelanggan = '$id_pelanggan'";
            $exe_0u=mysqli_query($koneksi,$sql_0u) ;  
            $sisa = "Rp. 0-";
         }else{
            //Kalau bayar semua otomatis hutang juga dibayar
          $sisa = "Rp. ".number_format($kembali);
        $sql_0u="UPDATE pelanggan
        SET hutang = '0' where id_pelanggan = '$id_pelanggan'";
        $exe_0u=mysqli_query($koneksi,$sql_0u) ;  
         }
         $carikode = mysqli_query($koneksi, "SELECT faktur from transaksi") or die (mysqli_error());
          // menjadikannya array
          $datakode = mysqli_fetch_array($carikode);
          $jumlah_data = mysqli_num_rows($carikode);
          // jika $datakode
          if ($datakode) {
           // membuat variabel baru untuk mengambil kode barang mulai dari 1
           $nilaikode = substr($jumlah_data[0], 1);
           // menjadikan $nilaikode ( int )
           $kode = (int) $nilaikode;
           // setiap $kode di tambah 1
           $kode = $jumlah_data + 1;
           // hasil untuk menambahkan kode 
           // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
           // atau angka sebelum $kode
           $kode_otomatis = "TJ".str_pad($kode, 4, "0", STR_PAD_LEFT);
          } else {
           $kode_otomatis = "TJ0001";
          }



         $sql_trans="INSERT INTO transaksi VALUES(NULL,'$id_pelanggan','$total','$jum_bayar','$kembali',NOW(),'$kode_otomatis', '$tambahHutang')";
$exe_trans=mysqli_query($koneksi,$sql_trans);
  

        
          
           } 

           $sql_pel="SELECT * FROM pelanggan
               where id_pelanggan = '$id_pelanggan'";
        $exe_pel=mysqli_query($koneksi,$sql_pel) ; 
        while($row=mysqli_fetch_assoc($exe_pel)){
		
		$nama_pelanggan=$row['nama_pelanggan'];
    $alamatPel = $row['alamat'];
    $nohpPel = $row['nohp'];
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
         <img src="dist/img/icon_teguhjaya.png" class="img-circle" alt="User Image" width="100" height="100"><br>
         Di jual Oleh
          <address>

            <strong>Teguh jaya</strong><br>
            Jln. soekarno Hatta<br>
            Phone: (804) 123-5432<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Pelanggan:
          <address>
            <strong><?php echo $nama_pelanggan; ?></strong><br>
            <?php echo $alamatPel;?><br>
            Phone: <?php echo $nohpPel;?>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Faktur #<?php echo $kode_otomatis ?></b><br>
          Admin:<br><?php echo $_SESSION['nama'];?>

          
         
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
	
	
	$sql="SELECT * FROM transaksi, pelanggan, keranjang, stok_toko where transaksi.id_transaksi='$id_trans' AND transaksi.id_pelanggan=pelanggan.id_pelanggan AND keranjang.id_pelanggan=transaksi.id_pelanggan AND keranjang.id_barangtoko=stok_toko.id_toko";
	
	$exe_sql=mysqli_query($koneksi,$sql);
	while($lihat=mysqli_fetch_array($exe_sql)){
		$id_pel=$lihat['id_pelanggan'];
    $id_transaksi = $lihat['id_transaksi'];
    $id_barangtoko = $lihat['id_barangtoko'];
    $id_barangtoko = $lihat['id_barangtoko'];
		$tgl = $lihat['tgl_transaksi'];
		$barang = $lihat['nama_toko'];
		$nama_pelanggan = $lihat['nama_pelanggan'];
		$qty = $lihat['jumlah_keranjang'];
		$subtotal =$lihat['harga_akhir'];
		$harga_akhir = "Rp. ".number_format($lihat['harga_akhir']);
		$hutang_tampil = "Rp. ".number_format($lihat['hutang']);

 //Insert Data to Barang_terjual
     $sql_ker="INSERT INTO barang_terjual VALUES (NULL,'$id_barangtoko','$id_pelanggan','$subtotal','$qty',NOW(),'$id_transaksi')";
     $exe_ker=mysqli_query($koneksi,$sql_ker);
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
 
          <form action="" method="post ">
            <a class="btn btn-success pull-right" href="act_selesai.php?id_pel=<?php echo $id_pel;?>&id_transaksi=<?php echo $id_transaksi;?>" style="margin-right: 5px;">Selesaikan Transaksi</a>
          <form>
         
        </div>
      </div>
		
		
    </section>
      <div class="clearfix"></div>
    </div>
    <?php include "footer.php";?>
   
    <script type=application/javascript>document.links[0].href="data:text/html;charset=utf-8,"+encodeURIComponent('<!doctype html>'+document.documentElement.outerHTML)</script>
