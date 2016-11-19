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
          <a href="suplier_tbh.php"><h3 class="box-title"><span class="glyphicon glyphicon-plus"></span>Suplier</h3></a>


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
                  <th>Nama Suplier</th>
                  <th>No Rekening</th>
                  <th>Hutang</th>
                  <th>Tempo</th>
                 
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$sql="SELECT * FROM suplier";
					$exe=mysqli_query($koneksi,$sql);
					while($data=mysqli_fetch_array($exe)){
				?>
                <tr>
                  <td><?php echo $data['nama_suplier'];?></td>
                  <td><?php echo $data['no_rekening'];?>
                  </td>
                  
                  <td>Rp.<?php echo number_format($data['hutang']);?></td>
                  
				  <td><?php echo $data['tempo'];?></td>
				  <td>
				 <button><a href="suplier_ubah.php?id=<?php echo $data['id_suplier'];?>"> <span class="glyphicon glyphicon-pencil">Edit</span></a></button>&nbsp;&nbsp;&nbsp;
				 
				 <button><a onclick="if (confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='suplier_hapus.php?id=<?php echo $data['id_suplier']; ?>' }"  class="glyphicon glyphicon-trash">Hapus</a></button>
				  
				  </td>
                </tr>
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
 
 