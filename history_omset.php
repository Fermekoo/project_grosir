<?php include "header.php";?>
 

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        History Omset
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
       
		
        <div class="box-body">
         <table id="example" class="table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>Tahun/Bulan</th>
                  <th>Omset</th>
                 
                 
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
          $sqlhistory="SELECT jual_hargaakhir,CONCAT(YEAR(tanggal),'/',MONTH(tanggal))  AS tahun_bulan, COUNT(*) AS jumlah_bulanan
            FROM barang_terjual
            GROUP BY YEAR(tanggal),MONTH(tanggal) " ;
					
					$exe=mysqli_query($koneksi,$sqlhistory);
					while($data=mysqli_fetch_array($exe)){
             $tahun =$data['tahun_bulan'];
             $jum_transaksi =$data['jumlah_bulanan'];
             $omset =$data['jual_hargaakhir'];
                 
          
				?>
                <tr>
                  <td><?php echo $tahun;?></td>
                  <td><?php echo $omset;?></td>
                   <td><?php echo $data['faktur'];?></td>
                  <td><?php echo $total;?></td>
                 <td><?php echo $hutang;?></td>
                  
				
				  <td>
				 <a class="btn btn-primary" href="detail_history.php?id=<?php echo $data['id_transaksi'];?>"> <span class="glyphicon glyphicon-file"></span> Lihat Detail</a>
				 
				  
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf'
        ]
    } );
} );
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
  </script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js">
  </script>
 
 