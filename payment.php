<?php
session_start();
include "db.php";
$idpem = $_GET["id"];
$ambil = mysqli_query($conn, "SELECT * FROM orders WHERE idOrders = '$idpem'");
$detpem = $ambil->fetch_assoc();
$idpelangganygbeli = $detpem["idUser"];
$idpelangganyglogin = $_SESSION["user"]["idUser"];
if ($idpelangganyglogin !== $idpelangganygbeli) {
  echo "<script>alert('Do Not Be Naughty!');</script>";
  echo "<script>location='history.php?halaman=history';</script>";
  exit();
}
?>
<!DOCTYPE>
<html>
<head>
	<title>Payment||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/pembayaran.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			  <ul>
        <li><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
        <li><a href = "about.php?halaman=about_us">About Us</a></li>  
        <li><a href = "product.php?halaman=product">Product</a></li>
        <li><a href = "viewcart.php?halaman=view_cart">Cart</a></li>
        <li><a href = "contact.php?halaman=contact_us">Contact Us</a></li>
         <?php
          if(isset($_SESSION['user'])){
            echo '<li class="active"><a href="history.php?halaman=history">History</a></li>';
            echo '<li><a href="logout.php?halaman=welcome">Logout</a></li>';
          }
          else{
            echo '<li><a href="login.php?halaman=login">Login</a></li>';
            echo '<li><a href="register.php?halaman=register">Register</a></li>';
          }
          ?>
      </ul>
		</div>
		<h1>Payment Confirmation</h1>
    <h2>Send your proof of payment here....</h2>
     <div class = "bayar">
    <p style="color: #F8F8FF; font-weight: bold;"> <br>Your total bill is Rp. <?php echo number_format($detpem['total']);?>
    </div>
    <div class="container">
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="name" placeholder="Enter Your name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Bank</label>
      </div>
      <div class="col-75">
        <input type="text" name="bank" placeholder="The sending bank..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Total</label>
      </div>
      <div class="col-75">
        <input type="text" name="total" placeholder="Payment Amount">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Photo Proof</label>
      </div>
      <div class="col-75">
        <input type="file" name="photo" placeholder="Enter Photo Proof..">
        <p>Photo proof must be in jpg / png format with a maximum of 2MB</p>
      </div>
    </div>
    <div class="row">
      <input type="submit" name="Save" value="Save">
    </div>
  </form>
  <?php
  if (isset($_POST["Save"])) {
    $namabukti = $_FILES["photo"]["name"];
    $lokasibukti = $_FILES["photo"]["tmp_name"];
    $namafiks = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti, "img/$namafiks");
    $nama = $_POST["name"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["total"];
    $tanggal = date("Y-m-d");

    $result = mysqli_query($conn, "INSERT INTO payment (idOrders, namaUser, bank, jumlahBayar, tglBayar, buktiPembayaran) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");
    $ambil = mysqli_query($conn,"UPDATE orders SET statusPembelian = 'Already sent payment' WHERE idOrders = '$idpem'");
     echo "<script>alert('Thank you for sending payment');</script>";
  echo "<script>location='history.php?halaman=history';</script>";
  }
  ?>
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