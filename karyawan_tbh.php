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
          <h3 class="box-title">Karyawan</h3>

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
$jekel=$_POST['jekel'];
$jabatan=$_POST['jabatan'];
$alamat=$_POST['alamat'];
$gambar=$_FILES['gambar']['name'];
if(strlen($gambar)>0){
	if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
	move_uploaded_file($_FILES['gambar']
	['tmp_name'],"foto/".$gambar);
	} }


$sql="insert into karyawan values('','$nama','$jekel','$jabatan','$alamat','$gambar')";
$exe=mysqli_query($koneksi,$sql);
if($exe){
							echo "<div class='alert alert-success'>
                                        <a class='close' data-dismiss='alert' href='#'>&times;</a>
                                        <strong>Success!</strong> Data Karyawan disimpan
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
                  <label>Nama Karyawan</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1"  placeholder="Nama Karyawan">
                </div>
				<div class="form-group">
		
                <label>Jenis Kelamin</label>
                <select class="form-control select2" id=""  style="width: 100%;" name="jekel">
                 

                  <option  value="Laki-laki">Laki-laki</option>
				  <option  value="Perempuan">Perempuan</option>
                 
                </select>
              </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" id="exampleInputEmail1" placeholder="jabatan">
                </div>
				<div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat"></textarea>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputFile">Foto</label>
                  <input type="file" id="exampleInputFile" name="gambar">

                  
                </div>
				
				<div class="box-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
              </div>
			  <form>
        </div>
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
 
 