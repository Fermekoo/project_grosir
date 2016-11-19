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
		<?php 
//include 'koneksi.php';
if (isset($_POST['simpan'])){
$nama=$_POST['nama'];
$rek=$_POST['rekening'];
$hutang=$_POST['hutang'];
$tempo=$_POST['tempo'];


$sql="insert into suplier values('','$nama','$rek','$hutang','$tempo')";
$exe=mysqli_query($koneksi,$sql);
if($exe){
							echo "<div class='alert alert-success'>
                                        <a class='close' data-dismiss='alert' href='#'>&times;</a>
                                        <strong>Success!</strong> Data Suplier disimpan
                                    </div>";
							
						}else{
							echo"<div class='alert alert-danger'>
                                        <a class='close' data-dismiss='alert' href='#'>&times;</a>
                                         Data Suplier gagal disimpan
                                    </div>";
							
						}

}
 ?>
         <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Suplier</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1"  placeholder="Nama Suplier">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">No Rekening</label>
                  <input type="text" name="rekening" class="form-control" id="exampleInputEmail1" placeholder="No Rekening">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">hutang</label>
                  <input type="text" name="hutang" class="form-control" id="exampleInputEmail1" placeholder="Hutang">
                </div>
				<div class="form-group">
        <label for="exampleInputDate">Tempo</label>
                   <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tempo">
                </div>
                </div>
				
				<div class="box-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
              </div>
			  <form>
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
 
 