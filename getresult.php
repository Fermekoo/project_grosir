<!DOCTYPE html>

<html>
<head>
 

table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','grosir');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"grosir");
$sql="SELECT * FROM barang WHERE id_gudang = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
?>
<div class="form-group">
                  
                  <input type="hidden" name="nama" class="form-control" id="exampleInputEmail1" value="<?php echo $row['nama']?>"
                </div>
<div class="form-group">
                  <label for="exampleInputEmail1">Jenis Barang</label>
                  <input type="text" name="jenis" class="form-control" id="exampleInputEmail1" value="<?php echo $row['jenis']?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Suplier Barang</label>
                  <input type="text" name="suplier" class="form-control" id="exampleInputEmail1" value="<?php echo $row['suplier']?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Modal</label>
                  <input type="text" name="modal" class="form-control" id="exampleInputEmail1" value="<?php echo $row['modal']?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Harga Atas</label>
                  <input type="text" name="harga_atas"class="form-control" id="exampleInputEmail1" value="<?php echo $row['harga_atas']?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">harga Bawah</label>
                  <input type="text" name="harga_bawah" class="form-control" id="exampleInputEmail1" value="<?php echo $row['harga_bawah']?>">
                </div>
				<div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Stok yang ada di gudang  <?php echo $row['jumlah']?>">
                </div>
				<div class="form-group">
        <label for="exampleInputDate">Tangal Masuk</label>
                   <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" value="<?php echo $row['tangal_masuk']?>">
                </div>
                </div>


<?php

mysqli_close($con); }

?>



</body>
</html>