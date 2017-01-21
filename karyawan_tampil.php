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
          <a href="karyawan_tbh.php"><h3 class="box-title"><span class="glyphicon glyphicon-plus"></span>Karyawan</h3></a>


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
                  <th>Nama</th>
                  <th>Jenis kelamin</th>
                  <th>jabatan</th>
                  <th>Alamat</th>
				  <th>Foto</th>
				  <th>Foto KTP</th>
				<th>No HP</th>
				<th>Hutang</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$sql="SELECT * FROM karyawan";
					$exe=mysqli_query($koneksi,$sql);
					while($data=mysqli_fetch_array($exe)){
						$hutang ="Rp. ".number_format($data['hutang'],'0',',','.')."-";
				?>
				
                <tr>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['jekel'];?>
                  </td>
                  
                  <td><?php echo $data['jabatan'];?></td>
                  
				  <td><?php echo $data['alamat'];?></td>
				   <td><a href="#harga_modal?id_karyawan=<?php echo $data['id']; ?>" data-toggle="modal" data-target="#harga_dialog"><img src="foto/<?php echo $data['foto'];?>" width="100" height="100"></a></td>
				   <td><img src="foto/ktp/<?php echo $data['ktp'];?>" width="100" height="100"></td>
				   <td><?php echo $data['nohp'];?></td>
				   <td><?php echo $hutang;?></td>
				  <td>
				 <a class="btn btn-warning" href="karyawan_edit.php?id_karyawan=<?php echo $data['id'];?>"> <span class="glyphicon glyphicon-pencil">Edit</span></a>&nbsp;&nbsp;&nbsp;
				 
				 <a class="btn btn-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='karyawan_hapus.php?id_karyawan=<?php echo $data['id']; ?>' }"  class="glyphicon glyphicon-trash">Hapus</a>
				  
				  </td>
                </tr>
				<!-- Modal HARGA -->
        <div class="modal fade" id="harga_dialog" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Harga</h4>
                    </div>
                    <div class="modal-body">
                        
            
                           <input type= "text" id="harga" class="form-control" name="harga"  >
                            <input  type="text" name="id_keranjang" id="id_keranjang" value="6" />
                            <input  type="text" name="id_toko" id="id_toko" value="" />
                             <input  type="text" name="jumlah_ker" id="jumlah_ker" value="" />
              
                        
                    </div>
                    
                </div>
            </div>
        </div>
					<?php } ?>
                
                
              </table>
        </div>
		

        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include "footer.php";?>
 
 
 