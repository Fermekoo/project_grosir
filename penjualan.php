<?php include "header.php";?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
            <?php
              include "koneksi.php";
              /*if(isset($_POST['tambah'])){
                 $id =$_POST['getID'];
                 $cek="SELECT * FROM stok_toko, barang where barang.id_gudang=stok_toko.id_gudang and stok_toko.id_gudang = '".$id."'";
               $k=mysqli_query($koneksi,$cek);
                $data=mysqli_fetch_array($k);
     $nama=$data['nama'];
     $harga_atas = $data['harga_atas_toko'];
     $jumlah = 1;
     $totalHarga = $jumlah* $harga_atas;

    
  echo $nm;

                 
              }
        else{*/
          
        
              

            ?>
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

      
<div class="row">
        <div class="col-md-8">

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><a href="#">Penjualan</a></h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
               <form action="" method="post">
                <div class="form-group">
              <div class="ui-widget">
               <label>Nama Pelanggan</label>
         <?php
         @$nama_pel=$_POST['nama_pelanggan'];
         @$id_pel=$_POST['id_pelanggan'];

         ?>
                 <div class="input-group input-group-sm">
                    <input type= "text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan"   value="">
                    <input  type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $id_pel;?>" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat" name="tambah_pelanggan">Tambah</button>
                    </span>
                 </div>
               
                
                 </div>
              </div>
        <div class="form-group">
              <div class="ui-widget">
                <label>cari Barang</label>
                 <div class="input-group input-group-sm">
                    <input type= "text" id="nama_barang" class="form-control" placeholder="Masukkan Nama Barang"  >
                    <input  type="hidden" name="getID" id="result" value="" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat" name="tambah">Tambah</button>
                    </span>
                 </div>
               
                
                 </div>
              </div>
                <!-- <div class="col-xs-4">
                  <button type="submit" name="tambah" class="btn btn-primary btn-block btn-flat">Tambah</button>
                </div> 
                 
          
              </form>-->
               <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
        
                <tr>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
          <th>Harga Beli</th>
                  <th>Sub Total</th>
          <th>Tanggal</th>
          <th>Action</th>
          
              
                </tr>
                </thead>
                <tbody>
        <?php
        error_reporting(0);
        
  
          /* if(isset($_POST['bayar'])){
           $id_pelanggan=$_POST['id_pelanggan'];
           $bayar=$_POST['bayarr'];
           $kembalian= $bayar - $total;
           $sql_belanja="INSERT INTO transaksi VALUES('',$id_pelanggan,'$total','$bayar','$kembalian',NOW())";
           $exe_bel=mysqli_query($koneksi,$sql_belanja);
           }*/
           
    
  
      if(isset($_POST['tambah_pelanggan'])){
          $id_pelanggan=$_POST['id_pelanggan'];
        $nama_pelanggan=$_POST['nama_pelanggan'];
        $nama_pel=$_POST['nama_pelanggan'];
        $hutang='0';
        $cek_id="SELECT id_pelanggan from pelanggan where id_pelanggan='$id_pelanggan'";
        $exe_id=mysqli_query($koneksi,$cek_id);
        $temu=mysqli_num_rows($exe_id);
          if($temu==0){
            $tbh_pelanggan="INSERT into pelanggan values ('','$nama_pel',NOW(),'$hutang')";
            $exe_tbh=mysqli_query($koneksi,$tbh_pelanggan);
          }else {
            $select_pel="SELECT * FROM pelanggan where id_pelanggan='28'";
            $exe_pel=mysqli_query($koneksi,$select_pel);
            while($dat_pel=mysqli_fetch_assoc($exe_pel)){
              // $htg=$dat_pel['hutang'];
              
            $htg= $dat_pel['hutang'];
             $hutang_tampil="Rp. ".number_format($dat_pel['hutang'],'0',',','.')."-";
            
            }
            } 
            }
      
      
      
        if(isset($_POST['tambah'])){
          $sql_idp="SELECT id_pelanggan from pelanggan where nama_pelanggan='$nama_pel'";
          $exe_idp=mysqli_query($koneksi,$sql_idp);
          while($data_idp=mysqli_fetch_assoc($exe_idp)){
            $id_pel=$data_idp['id_pelanggan'];
          }
            
          //$id_pel=$_POST['id_pelanggan'];
          $id =$_POST['getID'];
          $x="select harga_atas_toko from stok_toko where id_toko='$id'";
    $y=mysqli_query($koneksi,$x);
    while($z=mysqli_fetch_array($y)){
      $hrg=$z['harga_atas_toko'];
    }
                 $id =$_POST['getID'];
         $sid= session_id();
         //di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
$sql ="SELECT id_barangtoko FROM keranjang WHERE id_barangtoko='$id' AND id_sesion='$sid'";
$exe=mysqli_query($koneksi,$sql);
    $ketemu=mysqli_num_rows($exe);
    if ($ketemu==0){
    
        // kalau barang belum ada, maka di jalankan perintah insert
       $sql_0="INSERT INTO keranjang VALUES ('','$id','$id_pel','1','$hrg','$sid',NOW())";
     $exe_0=mysqli_query($koneksi,$sql_0);
    } else {
        //  kalau barang ada, maka di jalankan perintah update
        $sql_0u="UPDATE keranjang
                SET jumlah_keranjang = jumlah_keranjang WHERE id_sesion ='$sid' AND id_barangtoko='$id'";
        $exe_0u=mysqli_query($koneksi,$sql_0u) ;      
    }   
   // header('Location:penjualan.php');
   
                
        
                } 
              ?>
        <?php
        $sid = session_id();
          $sql_t="SELECT * FROM keranjang, stok_toko, barang where id_sesion='$sid' AND keranjang.id_barangtoko=stok_toko.id_toko AND stok_toko.id_gudang=barang.id_gudang";
          $exe_t=mysqli_query($koneksi,$sql_t);
        
          while($data=mysqli_fetch_array($exe_t)){
            $subtotal = $data['harga_akhir'] * $data['jumlah_keranjang'];
             $total += $subtotal;
            
             $totalSemua ="Rp. ".number_format($total,'0',',','.')."-";
             $harga="Rp. ".number_format($data['harga_atas_toko'],'0',',','.')."-";

        
        ?>
                <tr>
                  <td><?php echo $data['nama'];?></td>
                 <td><a href="#harga_modal" data-toggle="modal" data-target="#harga_dialog" data-id="<?php echo $data['id_keranjang'];?>" data-harga="<?php echo $data['harga_atas_toko'];?>" data-idtoko="<?php echo $data['id_barangtoko'];?>"><?php echo $harga; ?></a></td>

                   <td><a href="#qty_modal" data-toggle="modal" data-target="#qty_dialog" data-id="<?php echo $data['id_keranjang'];?>" data-jumlah="<?php echo $data['jumlah_keranjang'];?>"><?php echo $data['jumlah_keranjang']; ?></a></td>
                  <td><?php echo $data['harga_akhir'];?></td>
          <td><?php echo $subtotal;?></td>
          
          <td><?php echo $data['tanggal'];?></td>
          <td><a class="btn btn-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='keranjang_hapus.php?id=<?php echo $data['id_keranjang']; ?>' }"  class="glyphicon glyphicon-trash">Hapus</a></td>
          
                </tr>
          <?php } ?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
			
            

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
       <!-- Modal HARGA -->
        <div class="modal fade" id="harga_dialog" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Harga</h4>
                    </div>
                    <div class="modal-body">
                        <form id="harga_form" action="" method="POST">
            
                           <input type= "text" id="harga" class="form-control" name="harga"  >
                            <input  type="hidden" name="id_keranjang" id="id_keranjang" value="" />
                            <input  type="hidden" name="id_toko" id="id_toko" value="" />
              
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Close</button>
                        <button type="button" id="submitFormHarga" class="btn btn-default">OK</button>
                    </div>
                </div>
            </div>
        </div>
    
        
<!-- Modal QTY -->
        <div class="modal fade" id="qty_dialog" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Jumlah Barang</h4>
                    </div>
                    <div class="modal-body">
          
                        <form id="qty_form" action="" method="POST">
                           <input type= "text" id="jumlah_barang" class="form-control" name="jumlah_barang"  >
                            <input  type="hidden" name="id_keranjang" id="id_keranjang" value="" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="submitForm" class="btn btn-default">OK</button>
                    </div>
                </div>
            </div>
        </div>

       </form>
        <script>
        $(function(){
    $('#qty_dialog').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var idKeranjang = $(e.relatedTarget).data('id');
    var jumlahKeranjang = $(e.relatedTarget).data('jumlah');

    //populate the textbox
    $(e.currentTarget).find('input[name="id_keranjang"]').val(idKeranjang);
      $(e.currentTarget).find('input[name="jumlah_barang"]').val(jumlahKeranjang);
  });

    $('#harga_dialog').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var idKeranjang = $(e.relatedTarget).data('id');
    var harga = $(e.relatedTarget).data('harga');
    var idToko = $(e.relatedTarget).data('idtoko');

    //populate the textbox
    $(e.currentTarget).find('input[name="id_keranjang"]').val(idKeranjang);
    $(e.currentTarget).find('input[name="harga"]').val(harga);
    $(e.currentTarget).find('input[name="id_toko"]').val(idToko);
  });

   

  });
    /* must apply only after HTML has loaded */
    $(document).ready(function () {
        $("#qty_form").on("submit", function(e) {
            var postData = $(this).serializeArray();
            var formURL = "update_jumlahkeranjang.php";
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    $('#qty_dialog .modal-header .modal-title').html("Result");
                    $('#qty_dialog .modal-body').html(data);
                    $("#submitForm").remove();
                },
                error: function(jqXHR, status, error) {
                    console.log(status + ": " + error);
                }
            });
            e.preventDefault();
        });
         
         
        $("#submitForm").on('click', function() {
            $("#qty_form").submit();
            location.reload();
        });
    });


      // NEGO HARGA
     $(document).ready(function () {
        $("#harga_form").on("submit", function(e) {
            var postData = $(this).serializeArray();
            var formURL = "nego_harga.php";
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    $('#harga_dialog .modal-header .modal-title').html("Result");
                    $('#harga_dialog .modal-body').html(data);
                    $("#submitFormHarga").remove();
                },
                error: function(jqXHR, status, error) {
                    console.log(status + ": " + error);
                }
            });
            e.preventDefault();
        });
         
        $("#submitFormHarga").on('click', function() {
            $("#harga_form").submit();
            if (data!= "Maaf Tidak bisa") {
              location.reload();
            }
            
        });
        $("#btnClose").on('click', function() {
            
              location.reload();
            
            
        });
    });
</script>
          
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
         
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pelanggan</h3>
            </div>
            <div class="box-body">

              <div class="form-group">

                  <label><?php echo $nama_pelanggan ?></label>
                  <label><?php echo $id_pelanggan ?></label>
                <!-- /.input group -->
              </div>
             
              <!-- /.form group -->
             
<div class="row justify">
  <div class="col-sm-7 col-md-6">
    <div class="thumbnail">
      <div class="caption">
        <label>Hutang</label>
   
        <h3 class="justify" ><font color="#F44336"><label id="hutang" name="huntang" value=""></label> <?php echo $hutang_tampil ; ?></font></h3>
        
        <!-- <p><a href="#" class="btn btn-primary" role="button">bayar</a></p> -->
      </div>
    </div>
  </div>
  
  <div class="col-sm-7 col-md-6">
    <div class="thumbnail">
      <div class="caption">
        <label>Total Belanja</label>
         <h3 class="justify"><font color="#2196F3"><?php echo $totalSemua; ?></font></h3>
        <!-- <p><a href="#" class="btn btn-primary" role="button">bayar</a></p> -->
      </div>
    </div>
  </div>
</div>    
<form action="act_transaksi.php" method="post">
  <div class="input-group input-group-sm">

          
                    <input type= "text" name="jum_bayar" class="form-control" placeholder="Masukkan Jumlah"  >
                    <input  type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $id_pelanggan; ?>" />
                     <input  type="hidden" name="total" id="tot" value="<?php echo $total; ?>" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat" name="jumlah">Bayar</button>
                    </span>
                    
                  
                 </div>
                   </form>
       
         
      
          <!-- Custom Tabs -->
         
        <!-- /.col -->

       
        <!-- /.col -->
      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- iCheck -->
         
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include "footer.php";?>
<script>
$(function () {
   

   $( "#nama_barang" ).autocomplete({
        source: 'search_toko.php',
        select: function(event, ui) {
          var e = ui.item;
          document.getElementById('result').value = e.id;
          // $("#result").append(result);
      //      var result = "<p>label : " + e.label + " - id : " + e.id + "</p>";
      // $("#result").append(result);
    }


    });

   $( "#nama_pelanggan" ).autocomplete({
        source: 'search_pelanggan.php',
        select: function(event, ui) {
          var e = ui.item;
      var rp = toRp(e.hutang);
          document.getElementById('id_pelanggan').value = e.id;
       // document.getElementById('hutang').textContent = rp;
          console.log(e.hutang);
          console.log(e.id);
          // $("#result").append(result);
      //      var result = "<p>label : " + e.label + " - id : " + e.id + "</p>";
      // $("#result").append(result);
    }
    

    });



function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',-';
}
  
  });
</script>
