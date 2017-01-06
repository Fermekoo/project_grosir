<?php include "header.php";?>
 

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        History Penjualan
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
         


          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
		
        <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Transaksi</th>
                  <th>Nama Pelanggan</th>
                  <th>No Faktur</th>
                   <th>Total Belanjaan</th>
                  <th>Hutang</th>
                 
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
          $sqlhistory="SELECT * FROM transaksi, pelanggan, barang_terjual,stok_toko  WHERE
          transaksi.id_transaksi = barang_terjual.id_transaksi AND barang_terjual.jual_idpelanggan=pelanggan.id_pelanggan AND barang_terjual.id_barangtoko=stok_toko.id_toko GROUP BY barang_terjual.id_transaksi" ;
					
					$exe=mysqli_query($koneksi,$sqlhistory);
					while($data=mysqli_fetch_array($exe)){
             $hutang ="Rp. ".number_format($data['hutang_pertgl'],'0',',','.')."-";
                 $total ="Rp. ".number_format($data['tot_belanja'],'0',',','.')."-";
          
				?>
                <tr>
                  <td><?php echo $data['tgl_transaksi'];?></td>
                  <td><?php echo $data['nama_pelanggan'];?></td>
                   <td><?php echo $data['faktur'];?></td>
                  <td><?php echo $total;?></td>
                 <td><?php echo $hutang;?></td>
                  
				
				  <td>
				 <a class="btn btn-warning" href="detail_history.php?id=<?php echo $data['id_transaksi'];?>"> <span class="glyphicon glyphicon-pencil"></span> Lihat Detail</a>
				 
				 <a class="btn btn-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='suplier_hapus.php?id=<?php echo $data['id_suplier']; ?>' }"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
				  
				  </td>
                </tr>
					<?php } ?>
                
                
              </table>
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
 
 