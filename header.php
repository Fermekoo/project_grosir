<?php
				include"koneksi.php";
				session_start();
				if(!isset($_SESSION['uname'])){
					echo"<script>window.location.assign('index.php')</script>";
				}
			  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Teguh Jaya</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Sugestt -->
  <script type="text/javascript" src="js/jquery.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
   
   <!-- Data Table -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
   <!-- daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
  
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Teguh Jaya</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
			
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
			  <?php
			  $jum_notif="SELECT jum_minimal from notif where id=1";
			  $exe_jum=mysqli_query($koneksi,$jum_notif);
			 while($b=mysqli_fetch_assoc($exe_jum)){
				 $ab=$b['jum_minimal'];
				 
				  
				 
				$sql_notif="SELECT * FROM barang WHERE jumlah<='".$ab."'";
				$exe_notif=mysqli_query($koneksi,$sql_notif);
				$a=mysqli_num_rows($exe_notif);
				
				$sql_notiff="SELECT * FROM stok_toko WHERE jumlah_toko<='".$ab."'";
				$exe_notiff=mysqli_query($koneksi,$sql_notiff);
				$aa=mysqli_num_rows($exe_notiff);
				
				$sql_tempo="SELECT COUNT(*) FROM suplier where tempo=CURDATE()";
			 $exe_tempo=mysqli_query($koneksi,$sql_tempo);
			 $row_tempo=mysqli_num_rows($exe_tempo);
				
				$notf= $a + $aa +$row_tempo;
			 
			 
				//while($a=mysqli_fetch_array($exe_notif)){
			?>
				
				<span class="label label-warning"><?php echo $notf;?></span>
				</a>
            <ul class="dropdown-menu">
              <li class="header">Kamu punya</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
					<?php
        
            $not="SELECT * FROM barang,stok_toko where barang.jumlah<='$ab' AND stok_toko.jumlah_toko<='$ab'";
            $exe_not=mysqli_query($koneksi,$not);
            while($dat=mysqli_fetch_array($exe_not)){
              $nama=$dat['nama'];
          
        

						
							
					?>
                      <i class="fa fa-users text-aqua"></i><?php
					  echo"Stok $nama kurang dari $ab <br>";?>
					   
                    
					<?php } 
				}
			  ?>
			  </a>
                  </li>
				  
                </ul>
				
              </li>
			 
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
		  
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li  >
             <a href="logout.php" ><i class="fa fa-sign-out"></i> Keluar</a>
          </li>
                 
               
      
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="foto/<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['level'];?></a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>
		  <li class="treeview">
          <a href="home.php">
      

      
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">
            
            </span>
          </a>

         <!--  <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->

        </li>
<?php $jabatan=$_SESSION['level']?> 
      <?php if ($jabatan=='Super Super Admin' or $jabatan=='Super Admin' or $jabatan=='Admin'){
		?>
	  <li class="treeview">
          <a href="penjualan3.php">
		  

		  
            <i class="fa fa-cart-plus"></i> <span>Penjualan</span>
            <span class="pull-right-container">
            
            </span>
          </a>

         <!--  <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->

        </li>

    <li class="treeview">
          <a href="return_barang.php">
      

      
            <i class="fa fa-retweet"></i> <span>Return Barang</span>
            <span class="pull-right-container">
            
            </span>
          </a>

         <!--  <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->

        </li>
	  <?php } ?>
	  
	  <?php $jabatan=$_SESSION['level']?> 
			<?php if ($jabatan=='Super Super Admin' or $jabatan=='Super Admin' or $jabatan=='Stok Admin'){
		?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Barang Gudang</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
		  
          <ul class="treeview-menu">
            <li><a href="tampil_barang.php"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
            <li><a href="tbh_barang.php"><i class="fa fa-circle-o"></i> Tambah Barang</a></li>
			<?php } ?>
			<?php $jabatan=$_SESSION['level']?> 
			<?php if ($jabatan=='Super Super Admin' or $jabatan=='Super Admin'){
		?>
			<li><a href="notif.php"><i class="fa fa-circle-o"></i> Atur Notif</a></li>
            <?php } ?>
          </ul>
        </li> 

	
		
		 <?php $jabatan=$_SESSION['level']?> 
		 <?php if ($jabatan=='Super Super Admin' or $jabatan=='Super Admin' or $jabatan=='Stok Admin'){
		?>
		  <li class="treeview">
		<a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Barang Toko</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
         
		  <?php $jabatan=$_SESSION['level']?>
          <ul class="treeview-menu">
		  
            <li><a href="toko_tampil.php"><i class="fa fa-circle-o"></i> Stock barang</a></li>
			
            <li><a href="toko_tbh.php"><i class="fa fa-circle-o"></i>Tambah Barang</a></li>
             <?php } ?>
			<?php if ($jabatan=='Super Super Admin' or $jabatan=='Super Admin'){
		?>
			<li><a href="notif_toko.php"><i class="fa fa-circle-o"></i> Atur Notif</a></li>
			
	
          </ul>
		  </li> 
		  <li class="treeview">
		<a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Pelanggan</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
		  <?php //$jabatan=$_SESSION['level']?>
          <ul class="treeview-menu">
		  
            <li><a href="pelanggan_tampil.php"><i class="fa fa-circle-o"></i> Daftar pelanggan</a></li>
			<?php //if ($jabatan=='Super Super Admin' or $jabatan=='Super Admin'){
		?>
            <li><a href="pelanggan_tbh.php"><i class="fa fa-circle-o"></i>Tambah pelanggan</a></li>
			
			<?php } ?>
	
          </ul>
		  </li>
		  
		  <?php if ($jabatan=='Super Super Admin' or $jabatan=='Super Admin'){
		?>
		  <li class="treeview">

	
		
		  
		  <li class="treeview">

		<a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Suplier</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="suplier_tampil.php"><i class="fa fa-circle-o"></i>Suplier</a></li>
            <li><a href="suplier_tbh.php"><i class="fa fa-circle-o"></i> Tambah Suplier</a></li>
           
			<li><a href="suplier_hutang.php"><i class="fa fa-circle-o"></i>Bayar Hutang</a></li>
	

            
			
	
</ul>
		  </li>
		  <li class="treeview">

		<a href="#">
            <i class="fa fa-users"></i>
            <span>Data Karyawan</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="karyawan_tampil.php"><i class="fa fa-circle-o"></i>karyawan</a></li>
            <li><a href="karyawan_tbh.php"><i class="fa fa-circle-o"></i> Tambah Karyawan</a></li>
           
			<li><a href="karyawan_reg_admin.php"><i class="fa fa-circle-o"></i>Tambah Admin</a></li>
			<li><a href="karyawan_tampiladmin.php"><i class="fa fa-circle-o"></i>Akun Admin</a></li>
			<li><a href="karyawan_hislogin.php"><i class="fa fa-circle-o"></i>History Login</a></li>
	

            
			
	
</ul>
		  </li>
       <li class="treeview">
          <a href="history_penjualan.php">
      

      
            <i class="fa fa-book"></i> <span>Histori Penjualan</span>
            <span class="pull-right-container">
            
            </span>
          </a>

         <!--  <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->

        </li>
         <li class="treeview">
          <a href="#">
      

      
            <i class="fa fa-book"></i> <span>###</span>
            <span class="pull-right-container">
            
            </span>
          </a>

       

        </li> 
		<?php } ?>
		<li class="treeview">
          <a href="#">
      

      
            <i class="fa fa-book"></i> <span>###</span>
            <span class="pull-right-container">
            
            </span>
          </a>

       

        </li> 
      
		  

            
  
          </ul>
      </li>

        </li>
       
        
       
        
        
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>