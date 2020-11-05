<?php
session_start();
include "db.php";
$idOrders = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM payment WHERE idOrders = '$idOrders'");
$detail = $result->fetch_assoc();
if (empty($detail)) {
  echo "<script>alert('No payment data yet')</script>";
  echo "<script>location='history.php';</script>";
  exit();
}
?>
<!DOCTYPE>
<html>
<head>
	<title>See Payment||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/purchase.css">
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
    <h1>See Payment</h1>
		 <table>
      <thead>
          <tr>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Customer's Name</th>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Bank</th>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Total</th>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Date</th>
          </tr>
          <tr>
            <td><?php echo $detail['namaUser']?></td>
            <td><?php echo $detail['bank']?></td>
             <td>Rp. <?php echo number_format($detail['jumlahBayar'])?></td>
             <td><?php echo $detail['tglBayar']?></td>
          </tr>
      </thead> 
      <img src="img/<?php echo $detail['buktiPembayaran']?>" alt="" class = "imgya"> 
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