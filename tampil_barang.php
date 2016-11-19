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
	 <?php $jabatan=$_SESSION['jabatan']?>
        <div class="box-header with-border">

		<?php if ($jabatan=='Super Admin'){
		?>
		<a href="tbh_barang.php"><h3 class="box-title"><span class="glyphicon glyphicon-plus"></span>Stock Barang</h3></a> 
        <?php } ?>

         



          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
		
        <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">
<?php $jabatan=$_SESSION['jabatan']?>  
           
			   <thead>
                <tr>
				
                  <th>Nama Barang</th>
                  <th>jenis Barang</th>
                  <th>Suplier</th>
                 
                  <th>harga Atas</th>
				  <th>Jumlah</th>
				  
				  <th>Tanggal Masuk</th>
		
		
		<?php if ($jabatan=='Super Admin'){
		?>
				   <th>modal</th>
				  <th>harga bawah</th>
				  
				  <th>Action</th>
				  
                </tr>
                </thead>
		
		<?php } ?>
                <tbody>
				<?php
				/*if(isset($_GET['cari'])){
					$cari=$_GET['cari'];
					$sql="SELECT * FROM barang where nama like '$cari' or jenis like '$cari'";
					$exe=mysqli_query($koneksi,$sql);
				}else{*/
					$sql="SELECT * FROM barang";
					$exe=mysqli_query($koneksi,$sql);
				//}
					while($data=mysqli_fetch_array($exe)){

            if ($data['jumlah'] >=12 ) {
               // $jumlah_barang = (number_format($value->jumlah_barang/12,0))." Lusin";

               $lusin = (floor($data['jumlah']/12));
               $pcs = ($data['jumlah']%12);
               if ($pcs != 0) {
                    $jumlah_barang = $lusin. " Lusin  "."+  ". $pcs. " Pcs";
               }else{
                $jumlah_barang = $lusin. " Lusin  ";
               }
              


            }else{
                $jumlah_barang = ($data['jumlah']). " Pcs"; 
            }
              //Format uang
            $harga_bawah ="Rp. ".number_format($data['harga_bawah'],'0',',','.')."-";
             $harga_atas = "Rp. ".number_format($data['harga_atas'],'0',',','.')."-";
             $modal = "Rp. ".number_format($data['modal'],'0',',','.')."-";
				?>
				<?php $jabatan=$_SESSION['jabatan']?> 
                <tr>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['jenis'];?>
                  </td>
                  <td><?php echo $data['suplier'];?></td>
				  <td><?php echo $harga_atas;?></td>
				  <td><a href="jml_barang.php?id=<?php echo $data['id_gudang']?>"><?php echo $jumlah_barang;?></a></td>
				  <td><?php echo $data['tangal_masuk'];?></td>
	 <?php if ($jabatan=='Super Admin'){
		?>
                  <td><?php echo $modal;?></td>
                  
				  <td><?php echo $harga_bawah;?></td>
				  
				  <td>

				 

				<a  class="btn btn-warning" href="edit_barang.php?id=<?php echo $data['id_gudang'];?>"> <span class="glyphicon glyphicon-pencil"></span> Edit</a>
				 
				<a class="btn btn-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='hapus_barang.php?id=<?php echo $data['id_gudang']; ?>' }"><span class="glyphicon glyphicon-trash"></span> Hapus</a>

				  
				  </td>
                </tr>
					<?php } ?>
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
 
 