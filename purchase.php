<?php
session_start();
include "db.php";

if (!isset($_SESSION['email'])){
  echo '
        <script>
          alert("You Must Be Logged In :)");
          window.location = "loginAdmin.php?halaman=loginAdmin"
        </script>
        ';
}

?>
<!DOCTYPE>
<html>
<head>
	<title>Purchase||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/purchase.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			 <ul>
        <li><a href = "homeAdmin.php?halaman=produk?halaman=home">Home</a></li>
        <li><a href = "productAdmin.php?halaman=productAdmin">Product</a></li>
        <li class="active"><a href = "Purchase.php?halaman=purchase">Purchase</a></li>
         <li><a href = "PurchaseReport.php?halaman=purchaseReport">Purchase Report</a></li>
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
		<h1>SAj Purchase</h1>
    <table>
      <thead>
          <tr>
              <th>Customer's Name</th>
              <th>Date</th>
              <th>Purchase Status</th>
              <th>Total</th>
              <th>Action</th>
          </tr>
          <?php $result = mysqli_query($conn, "SELECT * FROM orders JOIN user ON orders.idUser = user.idUser"); ?>
          <?php while ($pecah = $result->fetch_assoc()){?>
          <tr>
              <td><?php echo $pecah['namaUser']; ?></td>
              <td><?php echo $pecah['date']; ?></td>
               <td><?php echo $pecah['statusPembelian']; ?></td>
              <td>Rp. <?php echo number_format($pecah['total']); ?></td>
              <td>
                  <a href="detailorder.php?halaman=detail&id=<?php echo $pecah['idOrders'];?>" class="button [secondary success alert]">Detail</a>
                  <?php  if($pecah['statusPembelian']!=="pending"){?>
                   <a href="customerPayment.php?halaman=pembayaran&id=<?php echo $pecah['idOrders'];?>" class="button [secondary success alert]">See Payment</a>
                 <?php } ?>
              </td>
          </tr>
        <?php } ?>
      </thead>  
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