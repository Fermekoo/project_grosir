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
				                  <th>Waktu Login</th>

					<th>Nama Lengkap</th>
                  <th>Username</th>
				  
                  <th>Level</th>
                  
                  
                 
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$sql="SELECT * FROM his_login order by id_login ASC";
					$exe=mysqli_query($koneksi,$sql);
					while($data=mysqli_fetch_array($exe)){
				?>
                <tr>
				<td><?php echo $data['tanggal'];?></td>
                  <td><?php echo $data['uname'];?></td>
				  <td><?php echo $data['uname'];?></td>
				  <td><?php echo $data['level'];?></td>
					
                  
				  
				   
				  <td>
				
				 
				 <a class="btn btn-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='karyawan_hapushis.php?id_his=<?php echo $data['id_login']; ?>' }"  class="glyphicon glyphicon-trash">Hapus</a>
				  
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
 
 