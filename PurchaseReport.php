<?php
session_start();
include "db.php";
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai ="-";

if (isset($_POST["view"])) {
  $tgl_mulai = $_POST["tglm"];
  $tgl_selesai = $_POST["tgls"];
 $result = mysqli_query($conn, "SELECT * FROM orders pm LEFT JOIN user pl ON pm.idUser = pl.idUser WHERE date BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
 while ($pecah = $result->fetch_assoc()) {
   $semuadata[]=$pecah;
 }
}


?>
<!DOCTYPE>
<html>
<head>
	<title>Purchase Report||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/addproduct.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			 <ul>
        <li><a href = "homeAdmin.php?halaman=produk?halaman=home">Home</a></li>
        <li><a href = "productAdmin.php?halaman=productAdmin">Product</a></li>
        <li><a href = "Purchase.php?halaman=purchase">Purchase</a></li>
         <li class="active"><a href = "PurchaseReport.php?halaman=purchaseReport">Purchase Report</a></li>
          <li><a href = "customers.php?halaman=customers">Customers</a></li>
         <?php
          if(isset($_SESSION['email'])){
            echo '<li><a href="logout.php?halaman=welcome">Logout</a></li>';
          }
          else{
            echo '<li><a href="loginAdmin.php?halaman=login">Login</a></li>';
          }
          ?>
      </ul>
		</div>
		<h2>Purchase Report from <?php echo $tgl_mulai?> to <?php echo $tgl_selesai?></h2>
    <div class="container">
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Start Date</label>
      </div>
      <div class="col-75">
        <input type="date" name="tglm" value="<?php echo $tgl_mulai?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Date of Completion</label>
      </div>
      <div class="col-75">
        <input type="date" name="tgls" value="<?php echo $tgl_selesai?>">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="view" value="View">
    </div>
  </form>
   <table  style="width: 750px;">
      <thead>
          <tr>
              <th style="color: #DB7093;">No.</th>
              <th style="color: #DB7093;">Customer</th>
              <th style="color: #DB7093;">Date</th>
              <th style="color: #DB7093;">Total</th>
              <th style="color: #DB7093;">Status</th>
          </tr> 
          <?php $totalya=0;?>
          <?php foreach ($semuadata as $key => $value): ?>
          <?php $totalya+=$value['total']?>
          <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $value["namaUser"]?></td>
              <td><?php echo $value["date"]?></td>
              <td>Rp. <?php echo number_format($value['total'])?></td>
               <td><?php echo $value["statusPembelian"]?></td>
          </tr>
           <?php endforeach ?>
      </thead>
        <tr>
          <th colspan="3" style="color: #DB7093; font-size: 15px;">Total</th>
          <th style="color: #DB7093;font-size: 15px;">Rp. <?php echo number_format($totalya)?></th>
        </tr>
    </table>
</header>
<footer>
           <p class="footer">Copyrights &copy; 2020 SAj Shopping-in Aja Yukk!!!. All Rights Reserved.</p>
        </footer>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>